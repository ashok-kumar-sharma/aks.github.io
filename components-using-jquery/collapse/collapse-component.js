$(document).ready(()=>{
	let lastInstance
	$('a[data-toggle]').click(function(){
		event.preventDefault()
		$(".collapse").slideUp()
		for(x of $("a[aria-expanded]")) //loop to make all the aria-expanded state false except the clicked one.
		{
			if($(x).attr("href")==$(this).attr("href"))
			{
				continue //to skip the aria-expanded when it is equal to the clicked one.
			}
			else
			{
				$(x).attr("aria-expanded","false")
			}
		}
		if($(this).attr('aria-expanded')=="true")
		{
			$(this).attr('aria-expanded',"false")
			$($(this).attr('href')).slideUp()
			return;
		}
		if($(this).attr('aria-expanded')=="false")
		{
			$(this).attr('aria-expanded',"true")
			$($(this).attr('href')).slideDown()
			return;
		}
	})
})
