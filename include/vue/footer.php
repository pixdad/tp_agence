<footer class="row footer bg-fond-sombre">
	<p class="ta-center">Copyright © 1997-2015 travelintagency.com - Travel'INT Agency - TSA 12345 - 91000 Evry Cedex -
	RCS Paris 123 456 789 - TVA intracommunautaire: FR12345678910 - IM 012345678 - N°IATA 123 45 678 - 
	Atout France : 5/9 rue Charles Fourier, 91000 EVRY - Déclaration CNIL: 1234567</p>
</footer>
<script>
	$(function(){
		$('.circuit-btn:first').addClass('circuit-btn-actif').next().css('display', 'inline-block');
	});
</script>
<script>
	function match(id_input1, id_input2) {
		var $ipt1 = $(id_input1);
		var $ipt2 = $(id_input2);
		var expr = $ipt1.val()=="" || $ipt1.val()==$ipt2.val() ;
		if(!expr) {
			alert('Les mots de passe ne correpondent pas');
			$ipt1.val("");$ipt2.val("");
		}
		return (expr);
	}
</script>