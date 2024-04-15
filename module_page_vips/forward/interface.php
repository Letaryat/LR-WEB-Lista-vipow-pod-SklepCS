<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="col-md-12 severtb">
                <div class="card">
                    <div class="header_page_cstom"><i class="fa-duotone fa-stars"></i> &nbsp <?php echo $Translate->get_translate_module_phrase( 'module_page_vips','_VIP_PLAYERS')?>: <?=sizeof($res_vips) ?></div>
                </div>
            </div>

            <div class="col-md-12 severtb">
                <div class="card">
                    <a class="chamska-reklama" href="https://sklepcs.pl/?p1=pierdolnik">Zakup vipa tutaj!</a>
                </div>
            </div>

            <div class="vip_portfolio_wrap">
                <?php for ( $i = 0, $sz = sizeof( $res_vips ); $i < $sz; $i++ ): $General->get_js_relevance_avatar($res_vips[ $i ]['identity'] ) ; $steam_short_1 = explode( ":", con_steam3to64_int( $res_vips[ $i ]['identity'] ) );?>
                    <?php $online_1 = !empty($this->Db->query('Core', 0, 0, 'SELECT * FROM lr_web_online WHERE user LIKE "%'. end($steam_short_1).'%"')) ? 1 : 0;?>
                    <div class="card_head_vips" id="<?php if(substractdates($res_vips[ $i ]['koniec']) <= 3)
                    {
                        echo 'ending';
                    }
                     else 
                     { 
                        echo 'good';
                    }
                    ?>">

                        <div class="general">
                            <div class="user_card_left">
                            <div class="nickname_vip"><?=action_text_clear( action_text_trim($General->checkName(con_steam32to64($res_vips[ $i ]['identity'])), 13) )?></div>
                            <div>
                                    <?php if( $General->arr_general['avatars'] != 0 ) {?>
                                        <a href="<?=$General->arr_general['site']?>profiles/<?=$res_vips[ $i ]['identity']?>/?search=1/">
                                            <img class="avatar_left_info" src="<?=$General->getAvatar(con_steam32to64($res_vips[ $i ]['identity']),1) ?>" alt="">
                                        </a>
                                    <?php } ?>	
                                </div>
                            <div class="last_game_info"><?=grouptell($res_vips[$i]['flags'])?></div>
                            </div>
                            <div class="more-info">
                                <div class="nickname_vip"><?=action_text_clear( action_text_trim($General->checkName($res_vips[ $i ]['identity'] ), 13) )?></div>
                                <div class="coords">
                                    <span class="group_vip"><?=$Translate->get_translate_module_phrase('module_page_vips', '_Group')?></span>
                                    <span class="group_vip_name">
                                        <?php grouptell($res_vips[$i]['flags']); ?>
                                    </span>
                                </div>
                                <div class="coords">
                                    <span class="steam_text"><?=$Translate->get_translate_module_phrase('module_page_vips', '_Steamid')?></span>
                                    <span onclick="copyToClipboard('<?=con_steam3to32_int( $res_vips[ $i ]['identity'] )?>')" style="cursor: pointer;" class="steam_id_vip"><?=$res_vips[ $i ]['identity'] ?> <i class="fa-solid fa-copy "></i></span>
                                </div>
                                <div class="coords">
                                    <span class="last_active"><?=$Translate->get_translate_module_phrase('module_page_vips', '_LastActive')?></span>
                                    <span class="vip_last_active">
                                        <?php echo $res_vips[ $i ]['koniec']?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function copyToClipboard(e) {
        var tempItem = document.createElement('input');

        tempItem.setAttribute('type','text');
        tempItem.setAttribute('display','none');

        let content = e;
        if (e instanceof HTMLElement) {
            content = e.innerHTML;
        }

        tempItem.setAttribute('value', content);
        document.body.appendChild(tempItem);

        tempItem.select();
        document.execCommand('Copy');
        document.cop

        tempItem.parentElement.removeChild(tempItem);
        note({
            content: "STEAMID ??????????!",
            type: "success"
        });
    }
</script>