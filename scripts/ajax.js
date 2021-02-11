//  @author          Bansi Joshi <bjoshi.490@gmail.com>
//  @Copyright       (c) 2021, Bansi Joshi. All Rights Reserved.
//  @Link            http://github.com/bansi490/ 

$('#submit').click( function()
{
    var sFormName = 'form[name=calculator] ';
    var oData =
    {
        oper : $(sFormName + '#oper').val(),
        num1 : $(sFormName + '#num1').val(),
        num2 : $(sFormName + '#num2').val()
    };

    console.log(oData);
    
    $.get('/../includes/call.php', oData, function(oOutput)
    {
        console.log(oOutput);
        $('#answer').text( $(oOutput).find('answer').text() );
        $('#summary').text( $(oOutput).find('summary').text() );
    });
});