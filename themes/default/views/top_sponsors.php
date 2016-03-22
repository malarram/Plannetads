<?php
$spon_qry = ORM::factory('Ad')->where('status', '=', Model_Ad::STATUS_PUBLISHED);
//if ($user_location)
//    $spon_qry->where('id_location', 'in', $user_location->get_siblings_ids());
    //if ad have passed expiration time dont show
    if (core::config('advertisement.expire_date') > 0) {
        $spon_qry->where(DB::expr('DATE_ADD( published, INTERVAL ' . core::config('advertisement.expire_date') . ' DAY)'), '>', Date::unix2mysql());
    }


    $spon_qry = $spon_qry->where('sponsored', '>=', Date::unix2mysql())->order_by('sponsored','DESC');
    $rows = $spon_qry->count_all();
    $spon_ads = $spon_qry->cached()->find_all();
?>
<? if($rows): ?>
<div class="uk-panel uk-panel-box sponsors-container">
    <div data-uk-slideset="{small: 2, medium: 4, large: 4, autoplay:true, autoplayInterval:5000}">
        <div class="uk-slidenav-position uk-slidenav-custom">
            <span class="uk-h5"><?=__('Sponsored ads')?></span>
            <a href="" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
            <a href="" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
        </div>
        <ul class="uk-grid uk-slideset">
            <? foreach($spon_ads as $ad): ?>
            <li>
                <div class="uk-panel uk-panel-box">
                    <div class="uk-panel-teaser">
                        <a href="<?= Route::url('ad', array('category' => $ad->category->seoname, 'seotitle' => $ad->seotitle)) ?>"> <img src="<?= $ad->get_list_image() ?>" alt="<?= HTML::chars($ad->title) ?>"></a>
                    </div>
                    <span class="uk-text-danger uk-text-bold uk-text-small"><?= i18n::money_format( $ad->price) ?></span>
                    <h5 class="uk-margin-top-remove">
                        <a href="<?= Route::url('ad', array('category' => $ad->category->seoname, 'seotitle' => $ad->seotitle)) ?>">
                            <?= $ad->title ?>
                        </a>
                    </h5>
                </div>
            </li>
            <?endforeach?>
        </ul>
    </div>
</div>
<? endif ?>