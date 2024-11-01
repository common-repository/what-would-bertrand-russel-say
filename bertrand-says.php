<?php
/*
Plugin Name: What Would Bertrand Russel Say
Plugin URI: http://nikos-web-development.netai.net/
Description: This is not just a plugin, it symbolizes the doubt and  disillusionment of an entire generation summed up in the quotes mostly put forth by Bertrand Russel.  When activated you will randomly see a quote from <cite>Bertrand Russel</cite> in the upper right of your admin screen on every page. <a href="http://profiles.wordpress.org/foo123" target="_blank">[ Other plugins ]</a>
Author: Nikos M.
Version: 0.1
Author URI: http://nikos-web-development.netai.net/
*/

function speak_bertrand() 
{
	/** These are the quotes. 
    http://en.wikiquote.org/wiki/Bertrand_Russell
    **/
	$quotes = "My whole religion is this: do every duty, and expect no reward for it, either here or hereafter
It is preoccupation with possession, more than anything else, that prevents men from living freely and nobly
The most essential characteristic of scientific technique is that it proceeds from experiment, not from tradition
If I were granted omnipotence, and millions of years to experiment in, I should not think Man much to boast of as the final result of all my efforts
Many orthodox people speak as though it were the business of sceptics to disprove received dogmas rather than of dogmatists to prove them. This is, of course, a mistake
Obscenity is whatever happens to shock some elderly and ignorant magistrate
if there were a God, I think it very unlikely that he would have such an uneasy vanity as to be offended by those who doubt his existence
if we are to live together, and not die together, we must learn a kind of charity and a kind of tolerance which is absolutely vital, to the continuation of human life on this planet
A world full of happiness is not beyond human power to create; the obstacles imposed by inanimate nature are not insuperable
The real obstacles lie in the heart of man, and the cure for these is a firm hope, informed and fortified by thought
To save the world requires faith and courage: faith in reason, and courage to proclaim what reason shows to be true
The governors of the world believe, and have always believed, that virtue can only be taught by teaching falsehood, and that any man who knew the truth would be wicked
The good life is one inspired by love and guided by knowledge
jealousy and possessiveness kill love
I am as firmly convinced that religions do harm as I am that they are untrue
The whole conception of God is a conception derived from the ancient Oriental despotisms. It is a conception quite unworthy of free men
We have, in fact, two kinds of morality side by side; one which we preach but do not practice, and another which we practice but seldom preach
William James used to preach the 'will-to-believe.' For my part, I should wish to preach the 'will-to-doubt.'
It is clear that thought is not free if the profession of certain opinions makes it impossible to earn a living
We are faced with the paradoxical fact that education has become one of the chief obstacles to intelligence and freedom of thought
Advocates of capitalism are very apt to appeal to the sacred principles of liberty, which are embodied in one maxim: The fortunate must not be restrained in the exercise of tyranny over the unfortunate
The fundamental defect of fathers, in our competitive society, is that they want their children to be a credit to them
The fundamental cause of the trouble is that in the modern world the stupid are cocksure while the intelligent are full of doubt
The fundamental concept in social science is Power
Men are born ignorant, not stupid; they are made stupid by education
The good life, as I conceive it, is a happy life
It is not by prayer and humility that you cause things to go as you wish, but by acquiring a knowledge of natural laws
The only thing that will redeem mankind is co-operation
We are speaking on this occasion, not as members of this or that nation, continent, or creed, but as human beings, members of the species Man, whose continued existence is in doubt
We have to learn to think in a new way
Three passions, simple but overwhelmingly strong, have governed my life: the longing for love, the search for knowledge, and unbearable pity for the suffering of mankind";

	// Here we split it into lines
	$quotes = explode( "\n", $quotes );

	// And then randomly choose a line
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function bertrand_says() {
	$chosen = speak_bertrand();
	echo "<p id='bertrand'><strong>Bertrand says:</strong> $chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'bertrand_says' );

// We need some CSS to position the paragraph
function bertrand_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#bertrand {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
        max-width:500px;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'bertrand_css' );

?>