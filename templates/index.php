<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF 8">
		<title> Email Filtering </title>
		<link rel="stylesheet" href="{{ url_for('static', filename='css/main.css')}}">
	</head>
	<body>
		<header>
				<a href="{{url_for('index')}} " class="logo"><img src="https://i.ibb.co/34t4wYw/Email-Classifier-100-x-50-px-200-x-150-px-200-x-100-px-300-x-200-px-2.png" alt="logo" width="220px" style="background-color:slategray"> </a>
				<nav>
					<ul class="nav_links">
						<li><a href="#">Home</li>
												
					</ul>
				</nav>
				<a class="cta" href="{{url_for('contact') }}"><button>Contact</button></a>
		</header>		
		<br>
		<form action="classify" method="post">
			{% with messages = get_flashed_messages(category_filter=["flash1"]) %}
  {% if messages %}
    <ul class=flashes>
    {% for message in messages %}
      <p>{{ message }}</p>
    {% endfor %}
    </ul>
  {% endif %}
{% endwith %}
						<br>
	
<textarea id="txtarea" placeholder="Enter email to be classfied ...." name="name_input" rows="8" cols="70" type="text">{% with messages = get_flashed_messages(category_filter=["flash2"])%}{% if messages %}{% for message in messages %}{{ message }}{% endfor %}{% endif %}{% endwith %}</textarea>

			<br>
			<input type="SUBMIT" value="Classify" id="classify">
		</form>

		
	</body>

</html>

