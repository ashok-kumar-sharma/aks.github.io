$(document).ready(function(){
  let modalId=""
  //To show modal
  $("button[data-toggle=modal]").click(function(){
    modalId=$(this).attr("data-target")
    $($(this).attr("data-target")).show()
  })
  //To hide modal when clicked outside of modal
  $(document).click(function(event){
    let clickedId = "#" + $(event.target).attr("id")
    if(modalId==clickedId)
    {
      $(modalId).hide()
    }
  })
  //To hide modal when clicked on close button
  $("button[data-dismiss=modal]").click(()=>{
    $(".modal").hide()
  })
})
