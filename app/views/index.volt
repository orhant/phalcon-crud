<!DOCTYPE html>
<html>
	{% include "layouts/head.volt" %}
	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">
			{% include "layouts/navbar.volt" %}
			{% include "layouts/sidebar.volt" %}
			<div class="content-wrapper">
				<div class="content-header">
					<div class="container-fluid">
						{% include "layouts/breadcrumb.volt" %}
					</div>
				</div>
				<section class="content">
					<div class="container-fluid">
						{{content()}}
					</div>
				</section>
			</div>
			{% include "layouts/footer.volt" %}

			<aside class="control-sidebar control-sidebar-dark"></aside>
		</div>

		{% include "layouts/script.volt" %}

		<script src="{{url(js)}}"></script>

	</body>
</html>
