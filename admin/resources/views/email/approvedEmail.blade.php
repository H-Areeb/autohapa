
 @if($Approved == '1')


    <html>
    	<head>
    		<title>Approved AD</title>
    	</head>
    	<body>
    	 <table>
    			<tr><td>&nbsp;</td></tr>
    			<tr><td><img src="http://autohapa.oneviewcrm.com/autohapa/assets/images/logo.png"></td></tr>
    			<tr><td>Dear {{ $name }}!</td></tr>
                <tr><td>Having this email : {{ $email }}!</td></tr>
    			<tr><td>&nbsp;</td></tr>
    			<tr><td>Your AD has been Approved Successfully!</td></tr>
    			<tr><td>&nbsp;</td></tr>
    			<tr><td><a href="http://autohapa.oneviewcrm.com/autohapa/ad-details/?ad-id={{$Ad_id}}">Your AD Title  : {{ $adTitle }}</a></td></tr>
    			<tr><td>Your AD has Registration Number : {{ $RegNum }}</td></tr>
    			<tr><td>&nbsp;</td></tr>
    			<tr><td>Thanks & Regards,</td></tr>
    			<tr><td>AutoHapa Team</td></tr>
    		</table>
    	
    	</body>
    </html>

@else
	
	
	<html>
    	<head>
    		<title>Rejected AD</title>
    	</head>
    	<body>
    	 <table>
    			<tr><td>&nbsp;</td></tr>
    			<tr><td><img src="http://autohapa.oneviewcrm.com/autohapa/assets/images/logo.png"></td></tr>
    			<tr><td>Dear {{ $name }}!</td></tr>
                <tr><td>Having this email : {{ $email }}!</td></tr>
    			<tr><td>&nbsp;</td></tr>
    			<tr><td>Your AD is Rejected !</td></tr>
    			<tr><td><strong>Reason:</strong> {{ $reason }}</td></tr>
    			<tr><td>&nbsp;</td></tr>
    			<tr><td><a href="#">Your AD Title  : {{ $adTitle }}</a></td></tr>
    			<tr><td>Your AD has Registration Number : {{ $RegNum }}</td></tr>
    			<tr><td>&nbsp;</td></tr>
    			<tr><td>Thanks & Regards,</td></tr>
    			<tr><td>AutoHapa Team</td></tr>
    		</table>
    	
    	</body>
    </html>
    
@endif    
    