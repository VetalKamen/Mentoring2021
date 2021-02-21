<?php
require_once 'Text.php';
require_once 'helper_functions.php';

$default_text      = '';
$text              = '';
$num_of_chars      = '';
$num_of_words      = '';
$num_of_sentences  = '';
$num_of_palindrome = '';
if ( ! empty( $_POST['inputValue'] ) ) {
	$start             = microtime( true );
	$text              = new Text( $_POST['inputValue'] );
	$num_of_chars      = $text->chars->get_count();
	$num_of_words      = $text->words->get_count();
	$num_of_sentences  = $text->sentences->get_count();
	$num_of_palindrome = $text->palindromes->get_count();
}

?>
<html>
<title>Text Analyzer</title>
<body>

<div>
    <h2>Hit the text!</h2>
    <br>
    <form action="index.php" method="post">
        <p><input type="text" name="inputValue"></p>
        <input type="submit" value="Analyze">
    </form>
    <br>
</div>
<?php if ( ! empty( $text ) ): ?>
    <div>
        <p>Number of chars: <?php echo $num_of_chars; ?></p>
        <p>Number of words: <?php echo $num_of_words; ?></p>
        <p>Number of sentences: <?php echo $num_of_sentences; ?></p>
        <p>Frequency of chars: <?php echo "<br>" . $text->chars->frequency(); ?></p>
        <p>Distribution of characters as a percentage of
            total: <?php echo "<br>" . $text->chars->frequency_in_percentage(); ?></p>
        <p>Average word length: <?php echo average( $num_of_chars, $num_of_words ); ?></p>
        <p>The average number of words in a
            sentence: <?php echo average( $num_of_words, $num_of_sentences ); ?></p>
        <p>Top 10 most used words: <?php echo "<br>" . $text->words->most_used(); ?></p>
        <p>Top 10 longest words: <?php echo "<br>" . $text->words->sort_by_length( 'longest' ); ?></p>
        <p>Top 10 shortest words: <?php echo "<br>" . $text->words->sort_by_length( 'shortest' ); ?></p>
        <p>Top 10 longest sentences: <?php echo "<br>" . $text->sentences->sort_by_length( 'longest' ); ?></p>
        <p>Top 10 shortest
            sentences: <?php echo $text->sentences->sort_by_length( 'shortest' ); ?></p>
        <p>Number of palindrome words: <?php echo $num_of_palindrome; ?></p>
        <p>Top 10 longest palindrome
            words: <?php echo "<br>" . $text->palindromes->sort_by_length( 'longest' ); ?></p>
        <p>Is the whole text a palindrome? (Without whitespaces and punctuation marks):
			<?php echo $text->is_palindrome() ? 'True' : 'False'; ?>
        </p>
		<?php
		$end       = microtime( true );
		$exec_time = $end - $start;
		?>
        <p>The time it took to process the text in ms: <?php echo $exec_time; ?></p>
        <p>The reversed text: <?php echo mb_strrev( $text->get_text() ); ?></p>
        <p>Report has been generated at: <?php echo date( "Y-m-d H:i:s" ); ?></p>
        <p>The reversed text but the character order in words kept
            intact: <?php echo reverse_default( $text->get_text() ); ?></p>

    </div>
<?php endif; ?>
</body>
</html>