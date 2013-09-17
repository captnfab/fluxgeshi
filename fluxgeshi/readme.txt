##
##
##        Mod title:  FluxGeshi 1.0
##
##      Mod version:  1.0.4
##  Works on FluxBB:  1.5.0-1.5.4
##     Release date:  2013-09-16
##      Review date:  YYYY-MM-DD (Leave unedited)
##           Author:  captnfab (captnfab@chezlefab.net)
##   Orginal author:  zaher dirkey (zaher at parmaja.com),
##                    Benjamin PIERRE (contact@creapun.com)
##
##      Description:  Allows users to use syntax coloration (thanks to Geshi)
##                    with the [code] tag.
##
##   Repository URL:  http://fluxbb.org/resources/mods/flux-geshi/
##
##   Affected files:  include/parser.php
##                    include/functions.php
##                    header.php
##
##       Affects DB:  No
##
##       DISCLAIMER:  Please note that "mods" are not officially supported by
##                    FluxBB. Installation of this modification is done at 
##                    your own risk. Backup your forum database and any and
##                    all applicable files before proceeding.
##


#
#---------[ 1. UPLOAD ]-------------------------------------------------------
#

files/geshi to /include/geshi
files/fluxgeshi.css to /

#
#---------[ 2. OPEN ]---------------------------------------------------------
#

include/parser.php

#
#---------[ 3. FIND (line: 77) ]---------------------------------------------
#

	// If the message contains a code tag we have to split it up (text within [code][/code] shouldn't be touched)
	if (strpos($text, '[code]') !== false && strpos($text, '[/code]') !== false)
		list($inside, $text) = extract_blocks($text, '[code]', '[/code]');


#
#---------[ 4. REPLACE WITH ]-------------------------------------------------
#

	// If the message contains a code tag we have to split it up (text within [code][/code] shouldn't be touched)
	if (strpos($text, '[/code]') !== false)
		list($inside, $text, $codelang) = extract_codeblocks($text, 'code');

#
#---------[ 5. FIND (line: 91) ]---------------------------------------------
#

	if ($pun_config['o_make_links'] == '1')
		$text = do_clickable($text);

	// If we split up the message before we have to concatenate it together again (code tags)
	if (isset($inside))
	{
		$outside = explode("\1", $text);
		$text = '';

		$num_tokens = count($outside);
		for ($i = 0; $i < $num_tokens; ++$i)
		{
			$text .= $outside[$i];
			if (isset($inside[$i]))
				$text .= '[code]'.$inside[$i].'[/code]';
		}

		unset($inside);
	}

#
#---------[ 6. REPLACE WITH ]-------------------------------------------------
#

	if ($pun_config['o_make_links'] == '1')
		$text = do_clickable($text);

#
#---------[ 7. FIND (line: 129) ]---------------------------------------------
#

		else
			break;
	}

#
#---------[ 8. AFTER, ADD ]-------------------------------------------------
#

	// If we split up the message before we have to concatenate it together again (code tags)
	if (isset($inside))
	{
		$text = merge_codeblocks($inside,$text,$codelang);
		unset($inside);
		unset($codelang);
	}

#
#---------[ 9. FIND (line: 143) ]---------------------------------------------
#

	// If the message contains a code tag we have to split it up (empty tags within [code][/code] are fine)
	if (strpos($text, '[code]') !== false && strpos($text, '[/code]') !== false)
		list($inside, $text) = extract_blocks($text, '[code]', '[/code]');

#
#---------[ 10. REPLACE WITH ]-------------------------------------------------
#

	// If the message contains a code tag we have to split it up (empty tags within [code][/code] are fine)
	if (strpos($text, '[/code]') !== false)
		list($inside, $text, $codelang) = extract_codeblocks($text, 'code');

#
#---------[ 11. FIND (line: 155) ]---------------------------------------------
#

	// If we split up the message before we have to concatenate it together again (code tags)
	if (isset($inside))
	{
		$parts = explode("\1", $text);
		$text = '';
		foreach ($parts as $i => $part)
		{
			$text .= $part;
			if (isset($inside[$i]))
				$text .= '[code]'.$inside[$i].'[/code]';
		}
	}

#
#---------[ 12. REPLACE WITH ]-------------------------------------------------
#

	// If we split up the message before we have to concatenate it together again (code tags)
	if (isset($inside))
	{
		$text = merge_codeblocks($inside,$text,$codelang);
		unset($inside);
		unset($codelang);
	}

#
#---------[ 13. FIND (line: 860) ]---------------------------------------------
#

//
// Parse message text
//
function parse_message($text, $hide_smilies)

#
#---------[ 14. BEFORE, ADD ]-------------------------------------------------
#

//
// Parse message code
//
function parse_code($code, $codename)
{
	global $pun_config, $lang_common, $pun_user;
	
	include_once(PUN_ROOT.'include/geshi/geshi.php');
	
	$geshi = new GeSHi($code, $codename, PUN_ROOT.'include/geshi/geshi');
	$geshi->set_header_type(GESHI_HEADER_DIV);
	// $geshi->enable_classes(true);
	// $geshi->set_overall_class(true);
	$geshi->set_code_style('');
	$geshi->set_line_style('');
	$geshi->tab_width = 2;
	$geshi->set_code_style('');
	// $geshi->encoding
	if ($fluxgeshi_line_numbers)
		$geshi->enable_line_numbers(GESHI_NORMAL_LINE_NUMBERS);
	
	$code = $geshi->parse_code();
	$codename = preg_replace('#[^a-zA-Z0-9\-_]#', '', $codename);
	$codename = strtolower($codename);
	
	$num_lines = ((substr_count($code, "\n")) + 3) * 1.5;
	$height_str = ($num_lines > 28) ? '28em' : $num_lines.'em';
	
	return '</p><div class="geshicodebox code_'.$codename.'">'.$code.'</div><p>';
}

#
#---------[ 15. FIND (line: 870) ]---------------------------------------------
#

	// Convert applicable characters to HTML entities
	$text = pun_htmlspecialchars($text);

	// If the message contains a code tag we have to split it up (text within [code][/code] shouldn't be touched)
	if (strpos($text, '[code]') !== false && strpos($text, '[/code]') !== false)
		list($inside, $text) = extract_blocks($text, '[code]', '[/code]');

#
#---------[ 16. REPLACE WITH ]-------------------------------------------------
#

	// If the message contains a code tag we have to split it up (text within [code][/code] shouldn't be touched)
	$codelang=array();
	if (strpos($text, '[/code]') !== false)
		list($inside, $text, $codelang) = extract_codeblocks($text, 'code');

	// Convert applicable characters to HTML entities
	$text = pun_htmlspecialchars($text);

#
#---------[ 17. FIND (line: 888) ]---------------------------------------------
#

	// If we split up the message before we have to concatenate it together again (code tags)
	if (isset($inside))
	{
		$parts = explode("\1", $text);
		$text = '';
		foreach ($parts as $i => $part)
		{
			$text .= $part;
			if (isset($inside[$i]))
			{
				$num_lines = (substr_count($inside[$i], "\n"));
				$text .= '</p><div class="codebox"><pre'.(($num_lines > 28) ? ' class="vscroll"' : '').'><code>'.pun_trim($inside[$i], "\n\r").'</code></pre></div><p>';
			}
		}
	}

#
#---------[ 18. REPLACE WITH ]-------------------------------------------------
#

	// If we split up the message before we have to concatenate it together again (code tags)
	if (isset($inside))
	{
		$parts = explode("\1", $text);
		$text = '';
		foreach ($parts as $i => $part)
		{
			$text .= $part;
			if (isset($inside[$i]))
			{
				$text .= parse_code($inside[$i],$codelang[$i]);
			}
		}
	}

#
#---------[ 19. OPEN ]---------------------------------------------------------
#

include/functions.php

#
#---------[ 20. FIND (line: 1844) ]---------------------------------------------
#

		$text = str_replace("\t", $spaces, $text);
	}

	return array($code, $text);
}

#
#---------[ 21. AFTER, ADD ]-------------------------------------------------
#

//
// Extract blocks from a text with a starting and ending tag
// This function always matches the most outer block so nesting is possible
//
function extract_codeblocks($text, $tag, $retab = true)
{
  global $pun_config;

  $start_re='\['.preg_quote($tag,'%').'(=([^\[]+?))?\]';
  $end='[/'.$tag.']';
  $code = array();
  $codelang = array();
  $end_len = strlen($end);
  $regex = '%(?:'.$start_re.'|'.preg_quote($end, '%').')%';
  $matches = array();
  if (preg_match_all($regex, $text, $matches))
  {
    $counter = $offset = 0;
    $start_pos = $end_pos = false;
    $start_len = 0;
    $cur_codelang = '';

    foreach ($matches[0] as $i => $match)
    {
      if ($match == $end)
      {
        $counter--;
        if ($counter == 0)
          $end_pos = strpos($text, $end, $offset + 1);
        $offset = strpos($text, $end, $offset + 1);
      }
      else // $match matches start
      {
        if ($counter == 0)
        {
          $cur_codelang = $matches[2][$i];
          $start_pos = strpos($text, $match);
          $start_len = strlen($match);
        }
        $counter++;
      }

      if ($start_pos !== false && $end_pos !== false)
      {
        $code[] = substr($text, $start_pos + $start_len,
          $end_pos - $start_pos - $start_len);
        $codelang[] = $cur_codelang;
        $text = substr_replace($text, "\1", $start_pos,
          $end_pos - $start_pos + $end_len);
        $start_pos = $end_pos = false;
        $offset = 0;
      }
    }
  }

  if ($pun_config['o_indent_num_spaces'] != 8 && $retab)
  {
    $spaces = str_repeat(' ', $pun_config['o_indent_num_spaces']);
    $text = str_replace("\t", $spaces, $text);
  }

  return array($code, $text, $codelang);
}

//
// Revert extract_codeblocks
//
function merge_codeblocks($code,$text,$codelang)
{
  $outside = explode("\1", $text);
  $text = '';

  $num_tokens = count($outside);
  for ($i = 0; $i < $num_tokens; ++$i)
  {
    $text .= $outside[$i];
    if (isset($code[$i]))
      if(isset($codelang[$i]) && ($codelang[$i]!=''))
        $text .= '[code='.$codelang[$i].']'.$code[$i].'[/code]';
      else
        $text .= '[code]'.$code[$i].'[/code]';
  }

  return $text;
}

#
#---------[ 22. OPEN ]---------------------------------------------------------
#

header.php

#
#---------[ 23. FIND (line: 87) ]---------------------------------------------
#

<link rel="stylesheet" type="text/css" href="style/<?php echo $pun_user['style'].'.css' ?>" />

#
#---------[ 24. BEFORE, ADD ]-------------------------------------------------
#

<link rel="stylesheet" type="text/css" href="fluxgeshi.css" />

#
#---------[ 25. OPEN ]---------------------------------------------------------
#

post.php

#
#---------[ 23. FIND (line: 465) ]---------------------------------------------
#

		// If the message contains a code tag we have to split it up (text within [code][/code] shouldn't be touched)
		if (strpos($q_message, '[code]') !== false && strpos($q_message, '[/code]') !== false)
		{
			list($inside, $outside) = split_text($q_message, '[code]', '[/code]');

			$q_message = implode("\1", $outside);
		}

#
#---------[ 18. REPLACE WITH ]-------------------------------------------------
#

		// If the message contains a code tag we have to split it up (text within [code][/code] shouldn't be touched)
		if (strpos($q_message, '[/code]') !== false)
			list($inside, $q_message, $codelang) = extract_codeblocks($q_message, 'code');

#
#---------[ 25. SAVE/UPLOAD ]--------------------------------------------------
#
