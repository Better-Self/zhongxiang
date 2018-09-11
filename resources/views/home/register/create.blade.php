<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
</head>
<body>
@extends('layout.message')
<form method="post" action="/home/register">
    {{ csrf_field() }}
    <fieldset class="form-group">
        <label for="name">用户名:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </fieldset>
    <fieldset class="form-group">
        <label for="email">邮箱</label>
        <input type="email" class="form-control" name="email" id="email" required>
    </fieldset>
    <fieldset class="form-group">
        <label for="password">密码:</label>
        <input type="password" name="password" class="form-control" id="password" >
    </fieldset>
    <fieldset class="form-group">
        <label for="password_confirmation">再次输入密码:</label>
        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
    </fieldset>
    <fieldset class="form-group">
        <label for="password_confirmation">手机号:</label>
        <input type="text" name="phone" class="form-control" id="phone">
    </fieldset>
    <button type="submit" class="btn btn-primary">提交</button>
</form>
</body>
</html>