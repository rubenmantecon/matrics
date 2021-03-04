<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Look And Feel</title>
    <script src="https://kit.fontawesome.com/92479866c9.js" crossorigin="anonymous"></script>
    <style>
        /* FONT */
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');

        * {
            font-family: 'Roboto', sans-serif;
        }

        body {
            margin: 0px;
            padding: 0px;
        }

        .container {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px 0;
        }

        .box {
            display: flex;
            justify-content: center;
        }

        .box>* {
            margin: 0 5px !important;
        }

        /* BUTTON, LINK */
        .btn.primary-btn {
            background-color: #1678c2 !important;
            color: #fff !important;
            text-shadow: none !important;
        }

        .btn.primary-btn:hover {
            background-color: #206091 !important;
        }

        .btn.secondary-btn {
            background-color: #1b1c1d !important;
            color: #fff !important;
            text-shadow: none !important;
        }

        .btn.secondary-btn:hover {
            background-color: #646464 !important;
        }

        .btn.save {
            background-color: #21ba45 !important;
            color: #fff !important;
            text-shadow: none !important;
        }

        .btn.save:hover {
            background-color: #20973c !important;
        }

        .btn.cancel {
            background-color: #ff695e !important;
            color: #fff !important;
            text-shadow: none !important;
        }

        .btn.cancel:hover {
            background-color: #c92b20 !important;
        }

        .btn {
            cursor: pointer;
            display: inline-block;
            min-height: 1em;
            outline: 0;
            border: none;
            vertical-align: baseline;
            background: #e0e1e2 none;
            color: rgba(0, 0, 0, .6);
            margin: 0 .25em 0 0;
            padding: .78571429em 1.5em .78571429em;
            text-transform: none;
            text-shadow: none;
            font-weight: 700;
            line-height: 1em;
            font-style: normal;
            text-align: center;
            text-decoration: none;
            border-radius: .28571429rem;
            -webkit-box-shadow: 0 0 0 1px transparent inset, 0 0 0 0 rgb(34 36 38 / 15%) inset;
            box-shadow: 0 0 0 1px transparent inset, 0 0 0 0 rgb(34 36 38 / 15%) inset;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-transition: opacity .1s ease, background-color .1s ease, color .1s ease, background .1s ease, -webkit-box-shadow .1s ease;
            transition: opacity .1s ease, background-color .1s ease, color .1s ease, background .1s ease, -webkit-box-shadow .1s ease;
            transition: opacity .1s ease, background-color .1s ease, color .1s ease, box-shadow .1s ease, background .1s ease;
            transition: opacity .1s ease, background-color .1s ease, color .1s ease, box-shadow .1s ease, background .1s ease, -webkit-box-shadow .1s ease;
            will-change: '';
            -webkit-tap-highlight-color: transparent;
        }

        .btn:hover {
            background-color: #a7a7a7 !important;
            color: #fff;
        }

        /* INPUTS */
        .input {
            margin: 0;
            max-width: 100%;
            font-size: 1em;
            -webkit-box-flex: 1;
            -ms-flex: 1 0 auto;
            flex: 1 0 auto;
            outline: 0;
            -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
            text-align: left;
            line-height: 1.21428571em;
            padding: .67857143em 1em;
            background: #fff;
            border: 2px solid #585858;
            color: rgba(0, 0, 0, .87);
            border-radius: .28571429rem;
            -webkit-transition: border-color .1s ease, -webkit-box-shadow .1s ease;
            transition: border-color .1s ease, -webkit-box-shadow .1s ease;
            transition: box-shadow .1s ease, border-color .1s ease;
            transition: box-shadow .1s ease, border-color .1s ease, -webkit-box-shadow .1s ease;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        input:focus {
            border: 2px solid #5cbdff;
            box-shadow: 0 0 10px #a6a6e8;
        }

        .focus {
            border: 2px solid #5cbdff;
            box-shadow: 0 0 10px #a6a6e8;
        }

        /* MESAGE */
        .message {
            display: none;
            padding: 0.55em 2em;
            margin: 1.2em 0 1.2em 0;
            border-radius: 10px;
        }

        .msg-info {
            color: #fff;
            background-color: #2196F3;
            border: 1px solid #58748a;
            box-shadow: 0 0 5px #2196F3;
        }

        .msg-success {
            color: #fff;
            background-color: #4CAF50;
            border: 1px solid #39883c;
            box-shadow: 0 0 5px #4CAF50;
        }

        .msg-warning {
            color: #fff;
            background-color: #ff9800;
            border: 1px solid #ad7c33;
            box-shadow: 0 0 5px #ff9800;
        }

        .msg-error {
            color: #fff;
            background-color: #f44336;
            border: 1px solid #a0342c;
            box-shadow: 0 0 5px #f44336;
        }

        /* HEADER */
        header.admin {
            background-color: #ffa500;
        }

        header {
            background-color: #64b7ff;
            width: 100%;
            display: flex;
            justify-content: space-around;
            height: 100px;
        }

        header>.logo-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        header>.logo-box>img.logo {
            border-radius: 100px;
        }

        header>.items {
            display: flex;
            flex-flow: row nowrap;
        }

        header>.items>.item {
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
            align-items: center;
            margin: 0 15px;
            font-size: 1.3em;
            text-decoration: none;
            color: #023382;
        }

        header>.items>.item.active {
            font-weight: bold;
        }

        header>.items>.item:hover {
            color: #000000;
        }

        header>p.user {
            font-size: 1.4em;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 500;
        }

        i.fas {
            margin-right: 5px;
        }

        /* LIST */
        .list {
            list-style-type: none;
            margin: 1em 0;
            padding: 0 0;
        }

        i.icon,
        i.icons {
            font-size: 1em;
        }

        i.icon {
            display: inline-block;
            opacity: 1;
            margin: 0 .25rem 0 0;
            width: 1.18em;
            height: 1em;
            font-family: Icons;
            font-style: normal;
            font-weight: 400;
            text-decoration: inherit;
            text-align: center;
            speak: none;
            font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            -webkit-font-smoothing: antialiased;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }

        .list>.item {
            display: flex;
            table-layout: fixed;
            list-style-type: none;
            list-style-position: outside;
            padding: .21428571em 0;
            line-height: 1.14285714em;
        }

        .list>.item>.content {
            display: table-cell;
            width: 100%;
            padding: 0 0 0 .5em;
            vertical-align: top;
        }

        .list>.item>.content>.header {
            display: block;
            margin: 0;
            font-weight: 700;
            color: rgba(0, 0, 0, .87);
        }

        .list>.item>.content>.description {
            display: block;
            color: rgba(0, 0, 0, .7);
        }

        /* TABLE */
        .table {
            width: 100%;
            background: #fff;
            margin: 1em 0;
            border-left: 1px solid rgba(34, 36, 38, .15);
            -webkit-box-shadow: none;
            box-shadow: none;
            border-radius: .28571429rem;
            text-align: left;
            color: rgba(0, 0, 0, .87);
            border-collapse: separate;
            border-spacing: 0;
        }

        th,
        td {
            border: 1px solid rgba(34, 36, 38, .15);
        }

        .table>thead th {
            cursor: auto;
            background: #f9fafb;
            text-align: inherit;
            color: rgba(0, 0, 0, .87);
            padding: .92857143em .78571429em;
            vertical-align: inherit;
            font-style: none;
            font-weight: 700;
            text-transform: none;
            border-bottom: 1px solid rgba(34, 36, 38, .1);
            border-left: none;
        }

        .table>tbody td {
            cursor: auto;
            background: #ffffff;
            text-align: inherit;
            color: rgba(0, 0, 0, .87);
            padding: .92857143em .78571429em;
            vertical-align: inherit;
            font-style: none;
            font-weight: 700;
            text-transform: none;
            border-bottom: 1px solid rgba(34, 36, 38, .1);
            border-left: none;
        }

    </style>
</head>

<body>
    <div class="container">
        <h1>Font Family</h1>
        <div class="box">
            <p>Roboto</p>
        </div>
    </div>
    <div class="container">
        <h1>Buttons, Links</h1>
        <div class="box">
            <button class="btn">Default</button>
            <button class="btn primary-btn">Primary</button>
            <button class="btn secondary-btn">Secondary</button>
            <button class="btn save">Save</button>
            <button class="btn cancel">Cancel</button>
        </div>
    </div>
    <div class="container">
        <h1>Input, Input:focus</h1>
        <div class="box">
            <input class="input" type="text" placeholder="username">
            <input class="input focus" type="text" value="focus">
        </div>
    </div>
    <div class="container">
        <h1>Message</h1>
        <div class="box" style="flex-direction: column;">
            <div class="message msg-success" style="display: block;width: 300px;margin-bottom: 10px !important;">Success</div>
            <div class="message msg-error" style="display: block;width: 300px;margin-bottom: 10px !important;">Error</div>
            <div class="message msg-warning" style="display: block;width: 300px;margin-bottom: 10px !important;">Warning</div>
            <div class="message msg-info" style="display: block;width: 300px;margin-bottom: 10px !important;">Information</div>
        </div>
    </div>
    <div class="container" style="padding: 0px">
        <h1>Header User</h1>
        <div class="box" style="width: 100%">
            <header style="margin: 0px !important">
                <div class="logo-box">
                    <img src="https://pbs.twimg.com/profile_images/478903857653620737/aNqCiRN7_400x400.jpeg" alt="logo"
                        class="logo" width="80">
                </div>
                <div class="items">
                    <a href="#user" class="item active"><i class="fas fa-home"></i> Home</a>
                    <a href="#login" class="item"><i class="fas fa-user-lock"></i> Login</a>
                    <a href="#test" class="item"><i class="fas fa-vial"></i> Test</a>
                </div>
                <p class="user"><i class="fas fa-user"></i> Student</p>
            </header>
        </div>
    </div>
    <div class="container" style="padding: 0px">
        <h1>Header Admin</h1>
        <div class="box" style="width: 100%">
            <header class="admin" style="margin: 0px !important">
                <div class="logo-box">
                    <img src="https://pbs.twimg.com/profile_images/478903857653620737/aNqCiRN7_400x400.jpeg" alt="logo"
                        class="logo" width="80">
                </div>
                <div class="items">
                    <a href="#user" class="item active"><i class="fas fa-home"></i> Home</a>
                    <a href="#login" class="item"><i class="fas fa-user-lock"></i> Login</a>
                    <a href="#test" class="item"><i class="fas fa-vial"></i> Test</a>
                </div>
                <p class="user"><i class="fas fa-user"></i> Admin</p>
            </header>
        </div>
    </div>
    <div class="container">
        <h1>List</h1>
        <div class="box">
            <div class="list">
                <div class="item">
                    <i class="fas fa-folder"></i>
                    <div class="content">
                        <div class="header">src</div>
                        <div class="description">Source files for project</div>
                        <div class="list">
                            <div class="item">
                                <i class="fas fa-file"></i>
                                <div class="content">
                                    <div class="header">src</div>
                                    <div class="description">Source files for project</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <i class="fas fa-folder"></i>
                    <div class="content">
                        <div class="header">dist</div>
                        <div class="description">Compiled CSS and JS files</div>
                    </div>
                </div>
                <div class="item">
                    <i class="fas fa-folder"></i>
                    <div class="content">
                        <div class="header">src</div>
                        <div class="description">Source files for project</div>
                    </div>
                </div>
                <div class="item">
                    <i class="fas fa-folder"></i>
                    <div class="content">
                        <div class="header">dist</div>
                        <div class="description">Compiled CSS and JS files</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h1>Table</h1>
        <div class="box" style="width: 80%">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Job</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Name">James</td>
                        <td data-label="Age">24</td>
                        <td data-label="Job">Engineer</td>
                    </tr>
                    <tr>
                        <td data-label="Name">Jill</td>
                        <td data-label="Age">26</td>
                        <td data-label="Job">Engineer</td>
                    </tr>
                    <tr>
                        <td data-label="Name">Elyse</td>
                        <td data-label="Age">24</td>
                        <td data-label="Job">Designer</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
