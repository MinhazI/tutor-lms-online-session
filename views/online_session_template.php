<?php

/**
 * Template Name: Online Session Template
 * Description: Template for online session content
 */

// Include the header
// get_header();
?>

<!-- Your custom content goes here -->
<div id="content">
    <iframe id="iframe" allow="camera; microphone; fullscreen; display-capture; autoplay" style="min-height: 1000px; width: 100%; border: 0px;">
    </iframe>


    <script>
        function getUrlParams() {
            const queryParams = new URLSearchParams(window.location.search);
            const params = {};

            for (const param of queryParams) {
                params[param[0]] = param[1];
            }

            return params;
        }

        console.log("hello hello")
        const urlParams = getUrlParams();
        console.log(urlParams);

        const urlVar = "https://strength.dyte.live/v2/meeting?id=" + urlParams['meeting_id'] + "&authToken=eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJvcmdJZCI6IjNiMGM3NGMzLTMwODQtNDkwYS04NjhiLWJkMTRkMDBhOWM2OSIsIm1lZXRpbmdJZCI6ImJiYmI4MDQ4LTUzMmQtNDY1Zi1hZjU4LTI0MWIxMTgyZTAyNCIsInBhcnRpY2lwYW50SWQiOiJhYWFhMzc1YS1kY2IwLTQwZTUtYWE3YS1jZjhiNDVkYzZlN2YiLCJwcmVzZXRJZCI6ImNhYjc4MjA0LWRjMmMtNDIxOC05Y2QwLWJlM2YxNTc5YjJkMyIsImlhdCI6MTcwODg3ODM1MywiZXhwIjoxNzE3NTE4MzUzfQ.lvPUJvZE9HNhfJTCmjJv2kcXxewDWDqReBzG1E2Mv0OeeF19-Im-P0Ze7S5T8gCzICady1KnwsgwANvdt8ryB9p4E8mhTuXs1jGdg4_OYdITZnmFsNuZtHbOrYLuOiDNENyTRYCpJvW1-YZf4Z-2ZbQrq3GfWIgMFf0Pxi8mv_7pXkHstJdfUGtHerqPouxLJrpS-HB1JMZmL89zJkKbAel9siMpe-jqorVHod1olDxqiMxPWwEAi06a_gE5giJw57BkyMX3YkDHN1CD0ta2SJ2JjAfnKBzIhJjNUkN6B4O2QfTUOBbsXbKROpHNPlV8aHTqEUe6ij8eg1BzN4NAZQ"
        // const urlVar = "https://strength.dyte.live/v2/meeting?id=bbbb8048-532d-465f-af58-241b1182e024&authToken=eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJvcmdJZCI6IjNiMGM3NGMzLTMwODQtNDkwYS04NjhiLWJkMTRkMDBhOWM2OSIsIm1lZXRpbmdJZCI6ImJiYmI4MDQ4LTUzMmQtNDY1Zi1hZjU4LTI0MWIxMTgyZTAyNCIsInBhcnRpY2lwYW50SWQiOiJhYWFhMzc1YS1kY2IwLTQwZTUtYWE3YS1jZjhiNDVkYzZlN2YiLCJwcmVzZXRJZCI6ImNhYjc4MjA0LWRjMmMtNDIxOC05Y2QwLWJlM2YxNTc5YjJkMyIsImlhdCI6MTcwODg3ODM1MywiZXhwIjoxNzE3NTE4MzUzfQ.lvPUJvZE9HNhfJTCmjJv2kcXxewDWDqReBzG1E2Mv0OeeF19-Im-P0Ze7S5T8gCzICady1KnwsgwANvdt8ryB9p4E8mhTuXs1jGdg4_OYdITZnmFsNuZtHbOrYLuOiDNENyTRYCpJvW1-YZf4Z-2ZbQrq3GfWIgMFf0Pxi8mv_7pXkHstJdfUGtHerqPouxLJrpS-HB1JMZmL89zJkKbAel9siMpe-jqorVHod1olDxqiMxPWwEAi06a_gE5giJw57BkyMX3YkDHN1CD0ta2SJ2JjAfnKBzIhJjNUkN6B4O2QfTUOBbsXbKROpHNPlV8aHTqEUe6ij8eg1BzN4NAZQ"
        console.log(urlVar)

        const iFrame = document.getElementById("iframe");

        iFrame.src = urlVar;
    </script>




</div>

<?php
// Include the footer
// get_footer();
?>