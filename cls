[33mcommit fda2c7e34ac61a5f6f5bf4d57b9b141c82781afc[m
Author: LuisMiguelS <luis_miguel04@hotmail.es>
Date:   Thu May 3 19:54:37 2018 -0400

    Estructura del proyecto creada

[1mdiff --git a/.env.example b/.env.example[m
[1mnew file mode 100644[m
[1mindex 0000000..ec44a12[m
[1m--- /dev/null[m
[1m+++ b/.env.example[m
[36m@@ -0,0 +1,39 @@[m
[32m+[m[32mAPP_NAME=Laravel[m
[32m+[m[32mAPP_ENV=local[m
[32m+[m[32mAPP_KEY=[m
[32m+[m[32mAPP_DEBUG=true[m
[32m+[m[32mAPP_URL=http://localhost[m
[32m+[m
[32m+[m[32mLOG_CHANNEL=stack[m
[32m+[m
[32m+[m[32mDB_CONNECTION=mysql[m
[32m+[m[32mDB_HOST=127.0.0.1[m
[32m+[m[32mDB_PORT=3306[m
[32m+[m[32mDB_DATABASE=homestead[m
[32m+[m[32mDB_USERNAME=homestead[m
[32m+[m[32mDB_PASSWORD=secret[m
[32m+[m
[32m+[m[32mBROADCAST_DRIVER=log[m
[32m+[m[32mCACHE_DRIVER=file[m
[32m+[m[32mSESSION_DRIVER=file[m
[32m+[m[32mSESSION_LIFETIME=120[m
[32m+[m[32mQUEUE_DRIVER=sync[m
[32m+[m
[32m+[m[32mREDIS_HOST=127.0.0.1[m
[32m+[m[32mREDIS_PASSWORD=null[m
[32m+[m[32mREDIS_PORT=6379[m
[32m+[m
[32m+[m[32mMAIL_DRIVER=smtp[m
[32m+[m[32mMAIL_HOST=smtp.mailtrap.io[m
[32m+[m[32mMAIL_PORT=2525[m
[32m+[m[32mMAIL_USERNAME=null[m
[32m+[m[32mMAIL_PASSWORD=null[m
[32m+[m[32mMAIL_ENCRYPTION=null[m
[32m+[m
[32m+[m[32mPUSHER_APP_ID=[m
[32m+[m[32mPUSHER_APP_KEY=[m
[32m+[m[32mPUSHER_APP_SECRET=[m
[32m+[m[32mPUSHER_APP_CLUSTER=mt1[m
[32m+[m
[32m+[m[32mMIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"[m
[32m+[m[32mMIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"[m
[1mdiff --git a/.gitattributes b/.gitattributes[m
[1mnew file mode 100644[m
[1mindex 0000000..967315d[m
[1m--- /dev/null[m
[1m+++ b/.gitattributes[m
[36m@@ -0,0 +1,5 @@[m
[32m+[m[32m* text=auto[m
[32m+[m[32m*.css linguist-vendored[m
[32m+[m[32m*.scss linguist-vendored[m
[32m+[m[32m*.js linguist-vendored[m
[32m+[m[32mCHANGELOG.md export-ignore[m
[1mdiff --git a/.gitignore b/.gitignore[m
[1mnew file mode 100644[m
[1mindex 0000000..67c0aea[m
[1m--- /dev/null[m
[1m+++ b/.gitignore[m
[36m@@ -0,0 +1,13 @@[m
[32m+[m[32m/node_modules[m
[32m+[m[32m/public/hot[m
[32m+[m[32m/public/storage[m
[32m+[m[32m/storage/*.key[m
[32m+[m[32m/vendor[m
[32m+[m[32m/.idea[m
[32m+[m[32m/.vscode[m
[32m+[m[32m/.vagrant[m
[32m+[m[32mHomestead.json[m
[32m+[m[32mHomestead.yaml[m
[32m+[m[32mnpm-debug.log[m
[32m+[m[32myarn-error.log[m
[32m+[m[32m.env[m
[1mdiff --git a/Highdmin_v1.1/Admin/horizontal/apps-calendar.html b/Highdmin_v1.1/Admin/horizontal/apps-calendar.html[m
[1mnew file mode 100644[m
[1mindex 0000000..8ce4c14[m
[1m--- /dev/null[m
[1m+++ b/Highdmin_v1.1/Admin/horizontal/apps-calendar.html[m
[36m@@ -0,0 +1,626 @@[m
[32m+[m[32m<!DOCTYPE html>[m
[32m+[m[32m<html>[m
[32m+[m[32m    <head>[m
[32m+[m[32m        <meta charset="utf-8" />[m
[32m+[m[32m        <title>Highdmin - Responsive Bootstrap 4 Admin Dashboard</title>[m
[32m+[m[32m        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />[m
[32m+[m[32m        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />[m
[32m+[m[32m        <meta content="Coderthemes" name="author" />[m
[32m+[m[32m        <meta http-equiv="X-UA-Compatible" content="IE=edge" />[m
[32m+[m
[32m+[m[32m        <!-- App favicon -->[m
[32m+[m[32m        <link rel="shortcut icon" href="assets/images/favicon.ico">[m
[32m+[m
[32m+[m[32m        <!--calendar css-->[m
[32m+[m[32m        <link href="../plugins/fullcalendar/css/fullcalendar.min.css" rel="stylesheet" />[m
[32m+[m
[32m+[m[32m        <!-- App css -->[m
[32m+[m[32m        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />[m
[32m+[m[32m        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />[m
[32m+[m[32m        <link href="assets/css/style.css" rel="styles