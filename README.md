About
-----

This CakePHP plugin provide a simple but powerfull way to monitor metrics on associated models.
Lets give some use case examples:

- monitor the views of a blog post
- monitor the clicks of a picture
- monitor the likes of something


Installation
------------

	$  git submodule add git@github.com:sassman/monitoring.git app/plugins/monitoring
	$  git submodule init
	$  git submodule update

now install the schema to your database

Usage
-----

 * Configuration

we configure the post model to include the 2 metrics 'view' and 'like'.

	class Post extends AppModel {
		public $actsAs = array(
			'monitoring.Monitorable' => array('type' => array(
				'like',
				'view',
			)),
		);
	}

 * Usage to monitor metrics

on the PostsController::view method we want to monitor the 'view' metrics
	
	class PostsController extends AppController {
		public function view( $id ){
			// a post is viewed, so lets track this as a metric like this
			$this->Post->monitor(array('type' => 'view', 'id' => $id));
		}
	}

 * Review the metrics

in the posts view we want to show the monitored metrics

	<!-- app/views/posts/view.ctp -->
	This post was <?php echo $post['Post']['views'] ?> viewed
	This post has <?php echo $post['Post']['likes'] ?> likes

Performance
-----------

 * Some thougths about the performance
 
for best performance the behavior cache each metrics. If the monitor function is called,
the cache (only for this metrics by metric-type, model, id) is updated.
