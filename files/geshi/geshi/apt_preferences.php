<?php
/*************************************************************************************
 * apt_preferences.php
 * ----------
 * Author: Fabien Givors (captnfab@chezlefab.net)
 * Copyright: (c) 2013 Fabien Givors (http://chezlefab.net/)
 * Release Version: 0.1
 * Date Started: 2013-09-15
 *
 * Apt preferences language file for GeSHi.
 *
 * CHANGES
 * -------
 * 2013-09-15 (0.1)
 *  -  Initial import
 *
 *************************************************************************************
 *
 *     This file is part of GeSHi.
 *
 *   GeSHi is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *   GeSHi is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with GeSHi; if not, write to the Free Software
 *   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 ************************************************************************************/

$language_data = array (
    'LANG_NAME' => 'Apt preferences',
    'COMMENT_SINGLE' => array(1 => '#'),
    'COMMENT_MULTI' => array(),
    'CASE_KEYWORDS' => GESHI_CAPS_NO_CHANGE,
    'QUOTEMARKS' => array(),
    'ESCAPE_CHAR' => '\\',
    'KEYWORDS' => array(
        /*keywords*/
        1 => array(
            'Package', 'Pin', 'Pin-Priority'
            ),
        2 => array(
            //Generic
            'stable', 'old-stable', 'testing', 'testing-proposed-updates',
            'unstable', 'unstable-proposed-updates', 'experimental',
            'non-US', 'security', 'volatile', 'volatile-sloppy',
            'apt-build',
            'stable/updates',
            'stable-updates',
            'stable-proposed-updates',
            'stable-backports',
            //Debian
            'buzz', 'rex', 'bo', 'hamm', 'slink', 'potato', 'woody', 'sarge',
            'etch', 'lenny', 'wheezy', 'sid',
            //Ubuntu
            'warty', 'warty-updates', 'warty-security', 'warty-proposed', 'warty-backports',
            'hoary', 'hoary-updates', 'hoary-security', 'hoary-proposed', 'hoary-backports',
            'breezy', 'breezy-updates', 'breezy-security', 'breezy-proposed', 'breezy-backports',
            'dapper', 'dapper-updates', 'dapper-security', 'dapper-proposed', 'dapper-backports',
            'edgy', 'edgy-updates', 'edgy-security', 'edgy-proposed', 'edgy-backports',
            'feisty', 'feisty-updates', 'feisty-security', 'feisty-proposed', 'feisty-backports',
            'gutsy', 'gutsy-updates', 'gutsy-security', 'gutsy-proposed', 'gutsy-backports',
            'hardy', 'hardy-updates', 'hardy-security', 'hardy-proposed', 'hardy-backports',
            'intrepid', 'intrepid-updates', 'intrepid-security', 'intrepid-proposed', 'intrepid-backports',
            'jaunty', 'jaunty-updates', 'jaunty-security', 'jaunty-proposed', 'jaunty-backports',
            'karmic', 'karmic-updates', 'karmic-security', 'karmic-proposed', 'karmic-backports',
            'lucid', 'lucid-updates', 'lucid-security', 'lucid-proposed', 'lucid-backports',
            'maverick', 'maverick-updates', 'maverick-security', 'maverick-proposed', 'maverick-backports',
            // Paquets
            '*',
            // Branches
            'main', 'restricted', 'preview', 'contrib', 'non-free',
            'commercial', 'universe', 'multiverse'
          ),
          3 => array(
            'origin', 'release', 'version'
          ),
          4 => array(
            'a', 'n', 'l', 'o')
    ),
    'REGEXPS' => array(
        0 => "(((http|ftp):\/\/|file:\/)[^\s]+)|(cdrom:\[[^\]]*\][^\s]*)",
        1 => " \-?[0-9\.~\+\-]+",
        ),
    'SYMBOLS' => array(
        ),
    'CASE_SENSITIVE' => array(
        GESHI_COMMENTS => false,
        1 => false,
        2 => true,
        3 => true
        ),
    'STYLES' => array(
        'KEYWORDS' => array(
            1 => 'color: #00007f;',
            2 => 'color: #b1b100;',
            3 => 'color: #b16000;'
            ),
        'COMMENTS' => array(
            1 => 'color: #adadad; font-style: italic;',
            ),
        'ESCAPE_CHAR' => array(
            ),
        'BRACKETS' => array(
            ),
        'STRINGS' => array(
            ),
        'NUMBERS' => array(
            ),
        'METHODS' => array(
            ),
        'SYMBOLS' => array(
            ),
        'REGEXPS' => array(
            0 => 'color: #009900;',
            ),
        'SCRIPT' => array(
            )
        ),
    'URLS' => array(
        1 => '',
        2 => '',
        3 => ''
        ),
    'OOLANG' => false,
    'OBJECT_SPLITTERS' => array(
        ),
    'STRICT_MODE_APPLIES' => GESHI_NEVER,
    'SCRIPT_DELIMITERS' => array(
        ),
    'HIGHLIGHT_STRICT_BLOCK' => array(
        ),
    'PARSER_CONTROL' => array(
        'ENABLE_FLAGS' => array(
            'NUMBERS' => GESHI_NEVER,
            'METHODS' => GESHI_NEVER,
            'SCRIPT' => GESHI_NEVER,
            'SYMBOLS' => GESHI_NEVER,
            'ESCAPE_CHAR' => GESHI_NEVER,
            'BRACKETS' => GESHI_NEVER,
            'STRINGS' => GESHI_NEVER,
        ),
        'KEYWORDS' => array(
            'DISALLOWED_BEFORE' => '(?<![a-zA-Z0-9\$_\|\#;>|^\/])',
            'DISALLOWED_AFTER' => '(?![a-zA-Z0-9_\|%\\-&\.])'
        )
    ),
    'TAB_WIDTH' => 4
);

?>
