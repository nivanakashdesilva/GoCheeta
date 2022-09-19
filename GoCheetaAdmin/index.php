<?php
require('top.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Table V01</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />

	<link rel="stylesheet" type="text/css" href="asset/vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="asset/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="asset/vendor/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="asset/vendor/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="asset/vendor/perfect-scrollbar/perfect-scrollbar.css">

	<link rel="stylesheet" type="text/css" href="asset/css/util.css">
	<link rel="stylesheet" type="text/css" href="asset/css/main.css">

	<meta name="robots" content="noindex, follow">
	<script
		nonce="0ac197ae-777b-474d-87b1-99510cb09ddb">(function (w, d) { !function (a, e, t, r) { a.zarazData = a.zarazData || {}; a.zarazData.executed = []; a.zaraz = { deferred: [] }; a.zaraz.q = []; a.zaraz._f = function (e) { return function () { var t = Array.prototype.slice.call(arguments); a.zaraz.q.push({ m: e, a: t }) } }; for (const e of ["track", "set", "ecommerce", "debug"]) a.zaraz[e] = a.zaraz._f(e); a.zaraz.init = () => { var t = e.getElementsByTagName(r)[0], z = e.createElement(r), n = e.getElementsByTagName("title")[0]; n && (a.zarazData.t = e.getElementsByTagName("title")[0].text); a.zarazData.x = Math.random(); a.zarazData.w = a.screen.width; a.zarazData.h = a.screen.height; a.zarazData.j = a.innerHeight; a.zarazData.e = a.innerWidth; a.zarazData.l = a.location.href; a.zarazData.r = e.referrer; a.zarazData.k = a.screen.colorDepth; a.zarazData.n = e.characterSet; a.zarazData.o = (new Date).getTimezoneOffset(); a.zarazData.q = []; for (; a.zaraz.q.length;) { const e = a.zaraz.q.shift(); a.zarazData.q.push(e) } z.defer = !0; for (const e of [localStorage, sessionStorage]) Object.keys(e || {}).filter((a => a.startsWith("_zaraz_"))).forEach((t => { try { a.zarazData["z_" + t.slice(7)] = JSON.parse(e.getItem(t)) } catch { a.zarazData["z_" + t.slice(7)] = e.getItem(t) } })); z.referrerPolicy = "origin"; z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a.zarazData))); t.parentNode.insertBefore(z, t) };["complete", "interactive"].includes(e.readyState) ? zaraz.init() : a.addEventListener("DOMContentLoaded", zaraz.init) }(w, d, 0, "script"); })(window, document);</script>
</head>

<body>
	<div class="limiter body">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<h2 class="header-wrap-table">Driver info</h2>
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column0">#</th>
								<th class="column1">id</th>
								<th class="column2">firstname</th>
								<th class="column3">lastname</th>
								<th class="column4">nic</th>
								<th class="column5">driver license number</th>
								<th class="column7">username</th>
								<th class="column8">vehical category</th>
								<th class="column9">vehical detail id</th>
								<th class="column10">branch</th>
								<th class="column11">status</th>
								

							</tr>
						</thead>
						<tbody>
							<?php
								$query = "SELECT * FROM `driver`";
								$query_run = mysqli_query($conn,$query);
								while($row = mysqli_fetch_assoc($query_run)){
    						?>
    								<tr>
        
        								<td> <?php echo $row['id'] ?> </td>
        								<td> <?php echo $row['firstname'] ?> </td>
        								<td> <?php echo $row['lastname'] ?> </td>
										<td> <?php echo $row['nic'] ?> </td>
										<td> <?php echo $row['driver_license'] ?> </td>
										<td> <?php echo $row['mobile_number'] ?> </td>
										<td> <?php echo $row['username'] ?> </td>
										<td> <?php echo $row['vehical_category_id'] ?> </td>
										<td> <?php echo $row['vehical_detail_id'] ?> </td>
										<td> <?php echo $row['branch_id'] ?> </td>
										<td> <?php echo $row['status'] ?> </td>
									</tr>

   							<?php
								}
							?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<script src="asset/vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="asset/vendor/bootstrap/js/popper.js"></script>
	<script src="asset/vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="asset/vendor/select2/select2.min.js"></script>

	<script src="asset/js/main.js"></script>

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
	</script>
	<script defer
		src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194"
		integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw=="
		data-cf-beacon='{"rayId":"73ed6e83a9c3b987","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.8.0","si":100}'
		crossorigin="anonymous"></script>
</body>

</html>