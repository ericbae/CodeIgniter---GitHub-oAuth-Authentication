<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
</head>
<body>
	<a class="connect_button github" href="https://github.com/login/oauth/authorize?client_id=<?php echo $this->config->item('github_client_id'); ?>&redirect_uri=<?php echo site_url('welcome/gh_accept'); ?>">GitHub</a>
</body>
</html>