function infoAlert (heading, text)
{
	$.toast({
        heading: heading,
        text: text,
        position: 'top-right',
        loaderBg: '#3b98b5',
        icon: 'info',
        hideAfter: 10000,
        stack: 1
    });
}

function dangerAlert (heading, text)
{
	$.toast({
        heading: heading,
        text: text,
        position: 'top-right',
        loaderBg: '#bf441d',
        icon: 'error',
        hideAfter: 7000,
        stack: 1
    });
}