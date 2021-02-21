<?php

require_once 'Interfaces/Frequency.php';
require_once 'helper_functions.php';
require_once 'Interfaces/Sorter.php';
require_once 'Interfaces/Counter.php';
require_once 'Interfaces/UsageMeter.php';

class Text {
	private $text;
	public $words;
	public $sentences;
	public $palindromes;
	public $chars;

	public function __construct( $text ) {
		$this->text        = trim( $text );
		$this->sentences   = new class( $this->text ) implements Sorter, Counter {
			public $array_sentences;

			public function __construct( $text ) {
				$this->array_sentences = explode( ".", $text );
			}

			public function sort_by_length( $length ): string {
				$values = $this->array_sentences;
				usort( $values, function ( $a, $b ) {
					return strlen( $b ) - strlen( $a );
				} );

				if ( $length == 'shortest' ) {
					$values = array_reverse( $values, true );

					return top_10_validation( $values );
				}

				return top_10_validation( $values );
			}

			public function get_count(): int {
				return count( $this->array_sentences );
			}
		};
		$this->words       = new class( $this->text ) implements Sorter, Counter, UsageMeter {
			public $array_words;
			public $default_text;

			public function __construct( $text ) {
				$this->default_text = $text;
				$this->array_words  = str_word_count( $text, 1 );
			}

			public function sort_by_length( $length ): string {
				$values = $this->array_words;
				usort( $values, function ( $a, $b ) {
					return strlen( $b ) - strlen( $a );
				} );

				if ( $length == 'shortest' ) {
					$values = array_reverse( $values, true );

					return top_10_validation( $values );
				}

				return top_10_validation( $values );
			}

			public function get_count(): int {
				return count( $this->array_words );
			}

			public function most_used(): string {
				$most_used    = [];
				$default_text = strtolower( $this->default_text );
				$words        = str_word_count( $default_text, 1 );
				$words_count  = array_count_values( $words );
				arsort( $words_count );

				foreach ( $words_count as $key => $value ) {
					$most_used[] = '"' . $key . '"' . 'used ' . $value . ' times';
				}

				return top_10_validation( $most_used );
			}
		};
		$this->palindromes = new class( $this->words ) implements Sorter, Counter {
			public $palindromes = [];

			public function __construct( $words ) {
				foreach ( $words->array_words as $word ) {
					if ( $word == mb_strrev( $word ) ) {
						$this->palindromes[] = $word;
					}
				}
			}

			public function sort_by_length( $length ): string {
				$values = $this->palindromes;
				usort( $values, function ( $a, $b ) {
					return strlen( $b ) - strlen( $a );
				} );

				if ( $length == 'shortest' ) {
					$values = array_reverse( $values, true );

					return top_10_validation( $values );
				}

				return top_10_validation( $values );
			}

			public function get_count(): int {
				return count( $this->palindromes );
			}
		};
		$this->chars       = new class( $this->text ) implements Frequency, Counter {
			public $array_chars = [];
			public $chars_str;

			public function __construct( $text ) {
				$this->array_chars = str_split( $text );
				$this->chars_str   = implode( $this->array_chars );
			}

			public function get_count(): int {
				return count( $this->array_chars );
			}

			public function frequency(): string {
				$freq_of_chars = [];
				foreach ( count_chars( $this->chars_str, 1 ) as $key => $value ) {
					$freq_of_chars[] = '"' . chr( $key ) . '"' . " matches : $value";
				}

				return implode( '<br>', $freq_of_chars );
			}

			public function frequency_in_percentage(): string {
				$freq_of_chars  = [];
				$all_char_count = strlen( $this->chars_str );
				foreach ( count_chars( $this->chars_str, 1 ) as $key => $value ) {
					$percentage      = number_format( (float) ( $value / $all_char_count ) * 100, 2, '.', '' );
					$freq_of_chars[] = '"' . chr( $key ) . '"' . " : $percentage % from total";
				}

				return implode( '<br>', $freq_of_chars );
			}
		};
	}

	public function get_text(): string {
		return $this->text;
	}

	public function is_palindrome(): bool {
		if ( $this->palindromes->get_count() == $this->words->get_count() ) {
			return true;
		}

		return false;
	}
}