<?php

/**
 * Приложение ColdOS на PHP.
 *
 * Поддерживается подмножество PHP: function, переменные $var,
 * интерполяция "$var", ассоциативные массивы, heredoc, foreach,
 * if/else и вызовы глобальных функций ColdOS.
 */

function __ENTRY_FN__()
{
    $id_app = "__APP_ID__";
    $height = "600";
    $width = "800";
    $actiontextname = "__DISPLAY_NAME__";
    $classdock = "user";
    $tooltip_app = "__DISPLAY_NAME__";
    $icon_app = "/coldos/osdata/Applications/User/$id_app/${ui_themeicons}.png";
    $addappindock = true;

    // Приложение уже запущено — просто поднимаем окно
    if (document.getElementById($id_app)) {
        Window_focus($id_app);
        return;
    }

    $config = [
        "enabled" => true,
        "resizeWidth" => true,
        "maximizable" => true,
        "minWidth" => 400,
        "maxWidth" => 1000,
        "resizeHeight" => true,
        "minHeight" => 300,
        "maxHeight" => 800,
        "icon" => $icon_app,
        "tooltip" => $tooltip_app,
        "actiontext" => $actiontextname,
    ];

    $htmlcode = <<<HTML
    <div class="titledrag" style="height: 60px; width: calc(100% - 130px); position: absolute; user-select: none; z-index: 200;" ondblclick="Window_maximize('$id_app')" onmousedown="move.window_systemos_api('.window', '$id_app')"></div>
    <div id="titlebar" style="display: flex; gap: 10px; margin-top: 17px; margin-left: 17px;">
      <div class="text_ui" style="font-size: 20px; font-family: CG-Bold;">__DISPLAY_NAME__</div>
      <div style="position: absolute; right: 21px; top: 21px;">
        <button class="minimize" tip="Свернуть" onclick="Window_minimize('$id_app'); clicksound()"></button>
        <button class="maximize" tip="Развернуть" onclick="Window_maximize('$id_app'); clicksound()"></button>
        <button class="close" tip="Закрыть" onclick="Window_kill('$id_app',true,true); clicksound()"></button>
      </div>
    </div>
    <div id="allcontent" class="allcontent">
      <h3>Привет из __DISPLAY_NAME__ на PHP!</h3>
      <p>Собрано с {{COMPILER_VER}}</p>
    </div>
    HTML;

    $jswin = "console.log('Приложение $actiontextname загружено');";

    Window_add($htmlcode, $id_app, $height, $width, true, $config, $addappindock, $classdock, $jswin);
}