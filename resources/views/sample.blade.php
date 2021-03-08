<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Look And Feel</title>
    <script src="https://kit.fontawesome.com/92479866c9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/template.css') }}">
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
            align-items: center;
        }

        .box.col {
            flex-direction: column;
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
        <h1>Message</h1>
        <div class="box" style="flex-direction: column;">
            <div class="message msg-success" style="display: block;width: 300px;margin-bottom: 10px !important;">Success
            </div>
            <div class="message msg-error" style="display: block;width: 300px;margin-bottom: 10px !important;">Error
            </div>
            <div class="message msg-warning" style="display: block;width: 300px;margin-bottom: 10px !important;">Warning
            </div>
            <div class="message msg-info" style="display: block;width: 300px;margin-bottom: 10px !important;">
                Information</div>
        </div>
    </div>
    <div class="container">
        <h1>Sample page</h1>
        <div class="box col">
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
            <br>
            <ul class="list">
                <li><a href="http://www.iesesteveterradas.cat/">This is a text link</a></li>
                <li><a href="http://www.iesesteveterradas.cat/">This is a text link</a></li>
                <li><a href="http://www.iesesteveterradas.cat/">This is a text link</a></li>
                <li><a href="http://www.iesesteveterradas.cat/">This is a text link</a></li>
                <li><a href="http://www.iesesteveterradas.cat/">This is a text link</a></li>
                <li><a href="http://www.iesesteveterradas.cat/">This is a text link</a></li>
            </ul>
            <br>
            <p>This is a second list:</p>
            <ol class="list">
                <li><a href="http://www.iesesteveterradas.cat/">This is a text link</a></li>
                <li><a href="http://www.iesesteveterradas.cat/">This is a text link</a></li>
                <li><a href="http://www.iesesteveterradas.cat/">This is a text link</a></li>
                <li><a href="http://www.iesesteveterradas.cat/">This is a text link</a></li>
                <li><a href="http://www.iesesteveterradas.cat/">This is a text link</a></li>
                <li><a href="http://www.iesesteveterradas.cat/">This is a text link</a></li>
            </ol>
        </div>
    </div>
    <div class="container">
        <h2>Sample Form</h2>
        <div class="box">
            <div class="container-form">
                <form class="form">
                    <span class="title">Login</span>
                    <div class="label-group">
                        <label for="user">Nom usuari: </label>
                        <input class="input" type="text" name="user" placeholder="username" id="name">
                    </div>
                    <div class="label-group">
                        <label for="password">Contrasenya: </label>
                        <input class="input" type="password" name="password" placeholder="password" id="password">
                    </div>
					<div class="label-group">
						<button class="btn secondary-btn">Sign In</button>
					</div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <h3>Super Important data</h3>
        <div class="box" style="width: 80%">
            <table class="table">
                <caption>The dark side teachers</caption>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Birthday</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Leandro Zabala</td>
                        <td>lzabala@xtec.cat</td>
                        <td>2021/02/24</td>
                        <td>iLoveAjax</td>
                    </tr>
                    <tr>
                        <td>Enric Mieza</td>
                        <td>emieza@xtec.cat</td>
                        <td>2021/02/24</td>
                        <td>ILovePHP</td>
                    </tr>
                    <tr>
                        <td>Xavi Gómez</td>
                        <td>xgomez@xtec.cat</td>
                        <td>2021/02/24</td>
                        <td>ILoveCSS</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
