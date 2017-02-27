# Assignment - *Week 4*

Submitted by: **Brian Wang**

Time spent: **2.5** hours spent in total

## User Stories

The following **required** functionality is complete:
* [x] Configure sessions
- Only allow session IDs to come from cookies
- Expire after one day
- Use cookies which are marked as HttpOnly
* [x] Login page
- An error message for when the username is not found
- An error message for when the username is found but the password does not match
- After a successful login, store the user's ID in the session data (as "user_id")
- After a successful login, store the user's last login time in the session data (as "last_login")
- Regenerate the session ID at the appropriate point to prevent Session Fixation
* [x] Require login to access area pages
- Add a login requirement to all staff area pages where necessary
* [x] Staff CMS for Territories
- Confirm that the referer sent in the requests is from the same domain as the host
- Create a CSRF token
- Store the CSRF token in the user's session
- Add the same CSRF token to the login form as a hidden input
- When submitted, confirm that session and form tokens match
- If the tokens do not match, you can should show a simple error message which says "Error: invalid request" and exits
- Make sure that legitimate use of the states/new.php and states/edit.php pages by a logged-in user still works as expected
* [x] Ensure the application is not vulnerable to XSS attacks
* [x] Ensure the application is not vulnerable to SQL Injection attacks
* [x] Penetration Testing

## Video Walkthrough

Here's a walkthrough of implemented user stories:

<img src='http://imgur.com/a/phPMd.gif' title='Video Walkthrough' width='' alt='Video Walkthrough' />

Issues with gif not appearing. Link is here: http://imgur.com/a/phPMd.

GIF created with [LiceCap](http://www.cockos.com/licecap/).

## Notes

Describe any challenges encountered while building the app.

Had issues with getting request_is_same_domain() to work as it seems that $_SERVER['HTTP_REFERER'] is not always set/sent by the user agent. Initially, I thought that this issue was probably, in some part, due to the way I've been testing the website by directly accessing the links in the browser and thus it wouldn't pass the value from page to page. However, even by navigating from the home page, the value still seems to be unset upon reaching the state/edit and state/new pages. I've disabled the check for now as I prefer to have a pushed solution that I personally can verify will work.


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
