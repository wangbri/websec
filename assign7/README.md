# Project 7 - WordPress Pentesting

Time spent: **X** hours spent in total

> Objective: Find, analyze, recreate, and document **five vulnerabilities** affecting an old version of WordPress

## Pentesting Report

1. (Required) Authenticated Stored Cross-Site Scripting (XSS)
  - [x] Summary: Allows remote authenticated users to inject arbitrary web script or HTML by leveraging the Author or Contributor role to place a crafted shortcode inside an HTML element
    - Vulnerability types: Cross-site scripting (XSS)
    - Tested in version: 4.2.2
    - Fixed in version: 4.2.3
  - [x] GIF Walkthrough: http://imgur.com/a/WGoRy
  - [x] Steps to recreate: HTML formatted around Wordpress shortcode is entered in a page or posting using the HTML edit mode (instead of the default WYSIWYG)
  - [x] Affected source code: wp-includes/kses.php and wp-includes/shortcodes.php
    - [Link 1](https://core.trac.wordpress.org/browser/tags/version/src/source_file.php)
2. (Required) Vulnerability Name or ID
  - [x] Summary: Stored Cross-Site Scripting (XSS) via Theme Name fallback
    - Vulnerability types: Cross-site scripting (XSS)
    - Tested in version: 4.2.2
    - Fixed in version: 4.2.11
  - [x] GIF Walkthrough: http://imgur.com/a/ye2Ww
  - [x] Steps to recreate: Change file directory name of theme.zip file to "&lt;svg onload=alert(1)&gt;" and then install the theme on the website
  - [ ] Affected source code: wp-includes/class-wp-theme.php and wp-includes/version.php
    - [Link 1](https://core.trac.wordpress.org/browser/tags/version/src/source_file.php)
3. (Required) Authenticated Stored Cross-Site Scripting (XSS) in YouTube URL Embeds
  - [x] Summary: Authenticated Stored Cross-Site Scripting (XSS) in YouTube URL Embeds
    - Vulnerability types: Cross-site scripting (XSS)
    - Tested in version: 4.2.2
    - Fixed in version: 4.2.13 
  - [x] GIF Walkthrough: http://imgur.com/a/1B7WS
  - [x] Steps to recreate: Place "[embed src='https://youtube.com/embed/12345\x3csvg onload=alert(1)\x3e'][/embed]" in a post via text edit mode (WYSIWYG)
  - [ ] Affected source code: wp-includes/embed.php and wp-includes/version.php
    - [Link 1](https://core.trac.wordpress.org/browser/tags/version/src/source_file.php)

## Assets

List any additional assets, such as scripts or files

## Resources

- [WordPress Source Browser](https://core.trac.wordpress.org/browser/)
- [WordPress Developer Reference](https://developer.wordpress.org/reference/)

GIFs created with [LiceCap](http://www.cockos.com/licecap/).

## Notes

Describe any challenges encountered while doing the work

## License

    Copyright [yyyy] [name of copyright owner]

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

        http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.
