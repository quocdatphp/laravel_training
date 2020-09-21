<div class="container">
	<div class="forbidden-sign"></div>
	<h1>Access to this page is restricted.</h1>
	<p>Ensure you have sufficient permissions.</p>
</div>

<style>

@import url("https://fonts.googleapis.com/css?family=Montserrat:400,400i,700");

body {
	display: flex;
	align-items: center;
	justify-content: center;
	height: 100vh;
	width: 100vw;
	background: #eceff1;
	font-family: Montserrat, sans-serif;
}

.container {
	background: white;
	height: auto;
	width: 40vw;
	padding: 1.5rem;
	box-shadow: 0px 3px 15px rgba(0, 0, 0, 0.2);
	border-radius: 0.5rem;
	text-align: center;

	h1 {
		font-size: 1.25rem;
		margin: 0;
		margin-top: 1rem;
		color: #263238;
		opacity: 0;
		transform: translateX(-0.1rem);
		animation: fadeIn 1s forwards 1.5s;
	}
	p {
		margin: 0;
		margin-top: 0.5rem;
		color: #546e7a;
		opacity: 0;
		transform: translateX(-0.1rem);
		animation: fadeIn 1s forwards 1.75s;
	}
}
@media screen and (max-width: 768px) {
	.container {
		width: 50vw;
	}
}
@media screen and (max-width: 600px) {
	.container {
		width: 60vw;
	}
}
@media screen and (max-width: 500px) {
	.container {
		width: 80vw;
	}
}

@keyframes fadeIn {
	from {
		transform: translateY(1rem);
		opacity: 0;
	}

	to {
		transform: translateY(0rem);
		opacity: 1;
	}
}
.forbidden-sign {
	margin: auto;
	width: 4.7rem;
	height: 4.7rem;
	border-radius: 50%;
	display: flex;
	align-items: center;
	justify-content: center;
	background-color: #ef5350;
	animation: grow 1s forwards;
}

@keyframes grow {
	from {
		transform: scale(1);
	}
	to {
		transform: scale(1);
	}
}

.forbidden-sign::before {
	position: absolute;
	background-color: white;
	border-radius: 50%;
	content: "4";
    font-size: 1.7rem;
	width: 4rem;
	height: 4rem;
	transform: scale(0);
	animation: grow2 0.5s forwards 0.5s;
}
@keyframes grow2 {
	from {
		transform: scale(0);
	}
	to {
		transform: scale(1);
	}
}

/* slash */
.forbidden-sign::after {
	content: "3";
    font-size: 2rem;
	z-index: 2;
	position: absolute;
	width: 4rem;
	height: calc(4rem/10);
	transform: scaley(0) rotateZ(0deg);
	background: #e21613;
	animation: grow3 0.5s forwards 1s;
}
@keyframes grow3 {
	from {
		transform: scaley(0) rotateZ(0deg);
	}
	to {
		transform: scaley(1) rotateZ(-45deg);
	}
}
</style>
