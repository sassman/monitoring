About
-----

This CakePHP plugin provide a simple but powerfull way to monitor metrics on associated models.
Lets give some use case examples:

- monitor the views of a blog post
- monitor the clicks of a picture
- monitor the likes of something


Installation
------------

<pre><code class="shell">
$  git submodule add git@github.com:sassman/monitoring.git app/plugins/monitoring
$  git submodule init
$  git submodule update
</code></pre>

now install the schema to your database

Usage
-----

 * Configuration

	we configure the post model to include the 2 metrics 'view' and 'like'.

<pre><code class="php">
<?php
	class Post extends AppModel {
		public $actsAs = array(
			'monitoring.Monitorable' => array('type' => array(
				'like',
				'view',
			)),
		);
	}
</code></pre>

 * Usage to monitor metrics

	on the PostsController::view method we want to monitor the 'view' metrics
	
<pre><code class="php">
<?php
	class PostsController extends AppController {
		public function view( $id ){
			// a post is viewed, so lets track this as a metric like this
			$this->Post->monitor(array('type' => 'view', 'id' => $id));
		}
	}
</code></pre>

 * Review the metrics

	in the posts view we want to show the monitored metrics

<pre><code class="php">
	<!-- app/views/posts/view.ctp -->
	This post was <?php echo $post['Post']['views'] ?> viewed
	This post has <?php echo $post['Post']['likes'] ?> likes
</code></pre>