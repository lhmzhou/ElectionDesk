<script language="javascript">
window.STREAM = {
	geofencePolygons: <?php echo $polygons_object; ?>,
	bookmarks: <?php echo $bookmark_ids; ?>
}
</script>

<section id="topics">
<ul>
  <li>
    <input type="checkbox" id="topic_wait_time" ng-change="filterChanged()" ng-model="topicQuery[6]">
    <label class="btn btn-default" for="topic_wait_time">Wait Time</label>
  </li>
  <li>
    <input type="checkbox" id="topic_polling_location" ng-change="filterChanged()" ng-model="topicQuery[7]">
    <label class="btn btn-default" for="topic_polling_location">Polling Location</label>
  </li>
  <li>
    <input type="checkbox" id="topic_adm_issues" ng-change="filterChanged()" ng-model="topicQuery[8]">
    <label class="btn btn-default" for="topic_adm_issues">Adm. Issues</label>
  </li>
  <li>
    <input type="checkbox" id="topic_pr_issues" ng-change="filterChanged()" ng-model="topicQuery[9]">
    <label class="btn btn-default" for="topic_pr_issues">PR Issues</label>
  </li>
  <li>
    <input type="checkbox" id="topic_voter_id" ng-change="filterChanged()" ng-model="topicQuery[10]">
    <label class="btn btn-default" for="topic_voter_id">Voter id</label>
  </li>
  <li>
    <input type="checkbox" id="topic_absentee_voting" ng-change="filterChanged()" ng-model="topicQuery[11]">
    <label class="btn btn-default" for="topic_absentee_voting">Absentee Voting</label>
  </li>
</ul>
</section>

<section id="feeds">
<h3>Toggle Feeds:</h3>

  <ul class="feed-buttons toggle">
    <li>
      <input type="checkbox" id="feed_twitter" ng-change="filterChanged()" ng-model="sourceQuery.twitter">
      <label for="feed_twitter"><i class="fa fa-twitter"></i></label>
    </li>
    <li>
      <input type="checkbox" id="feed_facebook" ng-change="filterChanged()" ng-model="sourceQuery.facebook">
      <label for="feed_facebook"><i class="fa fa-facebook"></i></label>
    </li>
    <li>
      <input type="checkbox" id="feed_googleplus" ng-change="filterChanged()" ng-model="sourceQuery.googleplus">
      <label for="feed_googleplus"><i class="fa fa-google-plus"></i></label>
    </li>
    <li>
      <input type="checkbox" id="feed_wordpress" ng-change="filterChanged()" ng-model="sourceQuery.wordpress">
      <label for="feed_wordpress"><i class="fa fa-wordpress"></i></label>
    </li>
    <li>
      <input type="checkbox" id="feed_disqus" ng-change="filterChanged()" ng-model="sourceQuery.disqus">
      <label for="feed_disqus"><i class="icon-disqus-social"></i></label>
    </li>
</ul><!--/feed buttons-->

<ul class="feed-buttons control">
  <li>
    <input type="checkbox" id="feed_paused" ng-model="streamIsActive" ng-change="togglePause()">
    <label for="feed_paused" id="feed_paused_label"><i class="fa fa-pause"></i></label>
  </li>
</ul><!--/feed buttons-->



<a href="/trending/bookmarks" class="btn btn-warning">Bookmarks</a>
</section>

<?php echo $stream; ?>

<section id="filters">
<h3>Limit Stream by Location or Distance</h3>

<ul class="limit-options">
  <li>
    <input type="radio" name="limit" value="all" ng-change="filterChanged()" ng-model="limitQuery" id="limit_all_posts">
    <label for="limit_all_posts"><i class="circle"></i> All posts</label>
  </li>

  <li>
    <input type="radio" name="limit" value="state" ng-change="filterChanged()" ng-model="limitQuery" id="limit_state" data-state="<?php echo $profile->user_state; ?>">
    <label for="limit_state"><i class="circle"></i> Within <?php echo (isset($states[$profile->user_state]) ? $states[$profile->user_state] : $profile->user_state); ?></label>
  </li>
  
  <li>
    <input type="radio" name="limit" value="radius" ng-change="filterChanged()" ng-model="limitQuery" id="limit_radius" data-lat="<?php echo $profile->user_lat; ?>" data-lon="<?php echo $profile->user_lon; ?>">
    <label for="limit_radius"><i class="circle"></i> Within radius</label>
  </li>
  
  <li>
    <input type="radio" name="limit" value="custom" ng-change="filterChanged()" ng-model="limitQuery" id="limit_custom">
    <label for="limit_custom">
      <i class="circle"></i> Within custom area
    </label>
  </li>
</ul>
<p class="custom-area-description"><em>You can define a custom area on the <a href="/areas">area settings</a> page.</em></p>

<div class="slider-container" ng-class="{'disabled': (limitQuery != 'radius')}">
  <h4>Radius:</h4>

  <slider ng-model="radiusQuery.val" slider-id="radiusSlider" min="1" max="1000" step="1" value="50" tooltip="always" formatter="radiusQuery.formatter" ng-change="radiusQuery.changed()" />
</div>

<h3>Filter</h3>
<div class="form-group filter-query-group">
  <div class="input-group">
    <div class="input-group-addon"><i class="fa fa-search"></i></div>
    <input type="text" id="filter-query" name="" class="form-control" ng-model="contentQuery" placeholder="Filter the current stream">
  </div>
</div>
</section>