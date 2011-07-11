<? /* page added by CraftySpace */ ?>

<ul>
  <li class="leaf first"><?php print l(t('Summary'), "user"); ?></li>
  <li class="leaf"><?php print l(t('My Checkouts'), "user/$uid/checkouts"); ?></li>
  <li class="leaf"><?php print l(t('My Requests'), "user/$uid/requests"); ?></li>
  <li class="leaf"><?php print l(t('My Fines'), "user/$uid/fines"); ?></li>
  <li class="expanded last"><?php print l(t('My Library'), "user/$uid/library"); ?>
    <ul class="menu">
      <li class="leaf first"><?php print l(t('Ratings'), "user/$uid/library/ratings"); ?></li>
      <li class="leaf"><?php print l(t('Reviews'), "user/$uid/library/reviews"); ?></li>
      <li class="leaf"><?php print l(t('Tags'), "user/$uid/library/tags"); ?></li>
      <li class="leaf last"><?php print l(t('Searches'), "user/$uid/library/searches"); ?></li>
    </ul>
  </li>
  <li class="leaf"><?php print l(t('Search Catalog'), "catalog/$uid/search"); ?></li>
  <li class="leaf"><?php print l(t('Edit Account'), "/user/$uid/edit"); ?></li>
  <li class="leaf last"><?php print l(t('Log out'), "logout"); ?></li>
</ul>
