<?php

use Melhore\Client\Controller\{
    AccountInfo,
    AddDiagnostic,
    AddMetric,
    AddVideo,
    ClientArea,
    ClientInfo,
    DeleteDiagnostic,
    DeleteMetric,
    DeleteUser,
    DeleteVideo,
    EditAccount,
    EditDiagnostic,
    EditMetric,
    EditVideo,
    LoginAuth,
    LoginForm,
    Logout,
    NewClient,
    NewDiagnostic,
    NewMetric,
    NewUser,
    NewVideo,
    SaveAccount,
    SaveDiagnostic,
    SaveMetric,
    SaveVideo,
    UserAuthenticate,
    UsersList,
    UserValidate
};

return [
    '/login' => LoginForm::class,
    '/validar-login' => LoginAuth::class,
    '/area-cliente' => ClientArea::class,
    '/logout' => Logout::class,
    '/painel-admin' => UsersList::class,
    '/novo-cliente' => NewClient::class,
    '/cliente-info' => ClientInfo::class,
    '/inserir-usuario' => NewUser::class,
    '/excluir-usuario' => DeleteUser::class,
    '/novo-video' => NewVideo::class,
    '/adicionar-video' => AddVideo::class,
    '/nova-metrica' => NewMetric::class,
    '/adicionar-metrica' => AddMetric::class,
    '/novo-diagnostico' => NewDiagnostic::class,
    '/adicionar-diagnostico' => AddDiagnostic::class,
    '/editar-video' => EditVideo::class,
    '/atualizar-video' => SaveVideo::class,
    '/excluir-video' => DeleteVideo::class,
    '/editar-metrica' => EditMetric::class,
    '/atualizar-metrica' => SaveMetric::class,
    '/excluir-metrica' => DeleteMetric::class,
    '/editar-diagnostico' => EditDiagnostic::class,
    '/atualizar-diagnostico' => SaveDiagnostic::class,
    '/excluir-diagnostico' => DeleteDiagnostic::class,
    '/info-conta' => AccountInfo::class,
    '/editar-conta' => EditAccount::class,
    '/salvar-conta' => SaveAccount::class,
    '/autenticar-usuario' => UserAuthenticate::class,
    '/validar-acesso' => UserValidate::class
];