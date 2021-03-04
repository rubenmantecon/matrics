<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Look And Feel</title>
    <script src="https://kit.fontawesome.com/92479866c9.js" crossorigin="anonymous"></script>
    <style>
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

        .focus {
            border: 2px solid #5cbdff;
            box-shadow: 0 0 10px #a6a6e8;
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
