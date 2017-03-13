{% extends 'layout.volt' %}

{% block content %}
    <h1>HttpCode example</h1>

    <p>
        <ul>
            <li><a href="/throw/401">Throw a 401</a></li>
            <li><a href="/throw/403">Throw a 403</a></li>
            <li><a href="/throw/404">Throw a 404</a></li>
            <li><a href="/throw/500">Throw a 500</a></li>
        </ul>

        <ul>
            <li><a href="/throw/json">Throw a JSON response</a></li>
            <li><a href="/return/json">Return a JSON response</a></li>
        </ul>
    </p>
{% endblock %}
