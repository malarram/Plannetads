<a class="uk-button report-listing-btn uk-button-link" type="button" href="<?=Route::url('contact')?>?subject=<?=__('Report Ad')?> - <?=$ad->id_ad?> - <?=$ad->title?>&message=<?=__('Report Ad')?> - <?=$ad->id_ad?> - <?=$ad->title?> - <?=Route::url('ad', array('category'=>$ad->category->seoname,'seotitle'=>$ad->seotitle))?>">
    <i class="uk-icon-flag" ></i> <?=__('Report this listing')?>
</a>