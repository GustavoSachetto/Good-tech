<?php

namespace App\Controller;

use App\Utils\View;
use App\Session\login\User as SessionLoginUser;

abstract class Page
{
    /** 
     * Método responsável por renderizar o cabeçalho da página
    */
    private static function getHeader(): string 
    {
        $values = SessionLoginUser::isLogged() ? [
            'status' => 'Minha conta',
            'route'  => 'conta/dados',
        ] : [
            'status' => 'Login',
            'route'  => 'conta/login',
        ];

        return View::render('layout/header', $values);
    }
    
    /** 
     * Método responsável por renderizar o rodapé da página
    */
    private static function getFooter(): string 
    {
        return View::render('layout/footer');
    }

    /** 
     * Método responsável por renderizar o conteúdo da página
    */
    public static function getPage(string $title, string $content): string 
    {
        return View::render('layout/page', [
            'title' => $title,
            'content' => $content,
            'header' => self::getHeader(),
            'footer' => self::getFooter()
        ]);
    }
}
