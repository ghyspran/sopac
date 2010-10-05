<?php
/*
 * Theme template for SOPAC hitlist
 *
 */

// Prep some stuff here

$new_author_str = sopac_author_format($locum_result['author'], $locum_result['addl_author']);
$url_prefix = variable_get('sopac_url_prefix', 'cat/seek');

if ($locum_result['cover_img'] && $locum_result['cover_img'] != 'CACHE') {
  $cover_img_url = $locum_result['cover_img'];
} else {
  $cover_img_url = '/' . drupal_get_path('module', 'sopac') . '/images/nocover.png';
}
?>
<div class="hitlist-item">



<table>
  <tr>
  <td class="hitlist-number" width="20px"><?php print $result_num; ?></td>
  <td width="115px">
    <a href="/<?php print $url_prefix . '/record/' . $locum_result['bnum'] ?>">
    <?php
    if (module_exists('covercache')) {
      print $cover_img;
    } else { ?>
      <img class="hitlist-cover" width="100" src="<?php print $cover_img_url; ?>">
    <?php } ?>
    </a>
    </td>
  <td width="330px" valign="top">
    <ul class="hitlist-info">
      <li class="hitlist-title">
        <strong><a href="/<?php print $url_prefix . '/record/' . $locum_result['bnum'] ?>"><?php print ucwords($locum_result['title']);?></a></strong>
        <?php if ($locum_result['title_medium']) { print "[$locum_result[title_medium]]"; } ?>
      </li>
      <li><a href="/<?php print $url_prefix . 
        '/search/author/' . 
        urlencode($new_author_str) .
        '">' . $new_author_str; ?></a>
      </li>
      <li><?php print $locum_result['pub_info']; ?></li>
      <?php if ($locum_result['callnum']) { 
        ?><li><?php print t('Call number: '); ?><strong><?php print $locum_result['callnum']; ?></strong></li><?php
      } else if (count($locum_result['avail_details'])) {
        ?><li><?php print t('Call number: '); ?><strong><?php print key($locum_result['avail_details']); ?></strong></li><?php
      } ?>
      <br />
      <li>
      <?php 
      print $locum_result['status']['avail'] . t(' of ') . $locum_result['status']['total'] . ' ';
      print ($locum_result['status']['total'] == 1) ? t('copy available') : t('copies available');
      ?>
      </li>
      <?php 
      if (!in_array($locum_result['loc_code'], $no_circ)) {
        print '<li class="item-request"><strong>» ' . sopac_put_request_link($locum_result['bnum']) . '</strong></li>';
      }
      ?>
    </ul>
  </td>
  <td width="10%">
  <ul class="hitlist-format-icon">
    <li><img src="<?php print '/' . drupal_get_path('module', 'sopac') . '/images/' . $locum_result['mat_code'] . '.png' ?>"></li>
    <li style="margin-top: -2px;"><?php print wordwrap($locum_config['formats'][$locum_result['mat_code']], 8, '<br />'); ?></li>
  </ul>

  </td>

  </tr>


</table>
</div>
