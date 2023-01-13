<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script>
        document.querySelectorAll('.button').forEach(button => button.innerHTML = '<div><span>' + button.textContent.trim().split('').join('</span><span>') + '</span></div>');
    </script>
    <style>
        .button {
        &.dark {
             --background: #2F3545;
             --shadow: 0 2px 8px -1px #{rgba(#151924, .32)};
             --shadow-hover: 0 4px 20px -2px #{rgba(#151924, .5)};
         }
        &.white {
             --background: #fff;
             --text: #275efe;
             --shadow: 0 2px 8px -1px #{rgba(#121621, .04)};
             --shadow-hover: 0 4px 20px -2px #{rgba(#121621, .12)};
         }
        &.fast {
             --duration: .32s;
         }
        }

        .button {
            --background: #275efe;
            --text: #fff;
            --font-size: 16px;
            --duration: .44s;
            --move-hover: -4px;
            --shadow: 0 2px 8px -1px #{rgba(#275efe, .32)};
            --shadow-hover: 0 4px 20px -2px #{rgba(#275efe, .5)};
            --font-shadow: var(--font-size);
            padding: 16px 32px;
            font-family: 'Roboto';
            font-weight: 500;
            line-height: var(--font-size);
            border-radius: 24px;
            display: block;
            outline: none;
            text-decoration: none;
            font-size: var(--font-size);
            letter-spacing: .5px;
            background: var(--background);
            color: var(--text);
            box-shadow: var(--shadow);
            transform: translateY(var(--y));
            transition: transform var(--duration) ease, box-shadow var(--duration) ease;
        div {
            display: flex;
            overflow: hidden;
            text-shadow: 0 var(--font-shadow) 0 var(--text);
        span {
            display: block;
            backface-visibility: hidden;
            font-style: normal;
            transition: transform var(--duration) ease;
            transform: translateY(var(--m));
            $i: 1;
        @while $i < 12 {
        &:nth-child(#{$i}) {
            transition-delay: $i / 20 + s;
        }
        $i: $i + 1;
        }
        }
        }
        &:hover {
             --y: var(--move-hover);
             --shadow: var(--shadow-hover);
        span {
            --m: calc(var(--font-size) * -1);
        }
        }
        &.reverse {
             --font-shadow: calc(var(--font-size) * -1);
        &:hover {
        span {
            --m: calc(var(--font-size));
        }
        }
        }
        }

        html {
            box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
        }

        * {
            box-sizing: inherit;
        &:before,
        &:after {
             box-sizing: inherit;
         }
        }

        // Center & dribbble
           body {
               min-height: 100vh;
               display: flex;
               font-family: 'Roboto', Arial;
               justify-content: center;
               align-items: center;
               background: #E4ECFA;
        .button {
            margin: 0 12px;
        }
        .dribbble {
            position: fixed;
            display: block;
            right: 20px;
            bottom: 20px;
        img {
            display: block;
            height: 28px;
        }
        }
        }



    </style>
</head>
<body>

<button onclick="OpenInformation">HIIIIII</button>
<div id="INFO" style="display:none"><table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col"> </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr>
        </tbody>
    </table>
</div>

<a href="" class="button">Button</a>
<a href="" class="button reverse dark">Reverse</a>
<a href="" class="button fast white">Fast</a>

<!-- dribbble -->
<a class="dribbble" href="https://dribbble.com/shots/7441241-Button-Hover-Effects" target="_blank"><img src="https://cdn.dribbble.com/assets/dribbble-ball-mark-2bd45f09c2fb58dbbfb44766d5d1d07c5a12972d602ef8b32204d28fa3dda554.svg" alt=""></a>





</body>
</html>