//HTML/CSS3/PSD/AI/FIGMA/XD/SKETCH/PREMIERE/AFTEREFFECT/3DANIMATION/UX/UI/VIDEO/ 
//
//2024 Copyright © 2024. Designed by ĐỖ NGUYÊN THANH TRIỀU
//
//https://www.facebook.com/profile.php?id=100015727831838
//
//Please Call me or Zalo App: 084 0901 479 994
//
//Mọi thông tin vui lòng liên hệ Email: sngdesigner@gmail.com
//
//Website: https://forum.sieunhan.xyz

function validateForm() {
  var name = document.getElementById("name").value;
  var birthyear = document.getElementById("year").value;
  if (name == "") {
    alert("Tên không được để trống");
    return false;
  } else if (birthyear < 2012 || birthyear > 2023) {
    alert("Năm không hợp lệ");
    return false;
  }
  return true;
}
//
$(function() {
  $('.input').on('input', function(){
    var source_name = $(this).attr('name');
    $('#output-'+source_name).text( $(this).val() );
	  
  });
	
}); 
function calculateYears() {
  const inputYear = parseInt(document.getElementById("year").value, 10);
  const currentYear = new Date().getFullYear();
  const number_year = currentYear - inputYear;
		  document.getElementById('sumyear').textContent = `Cảm ơn những cống hiến và đóng góp của bạn cho công ty suốt ${number_year} năm vừa qua`;
 
}
//

document.getElementById('btn_convert').addEventListener('click', function() {	   
		html2canvas(document.getElementById('html-content-holder'),
			{
				allowTaint: true,
				useCORS: true
			}).then(function (canvas) {
				var anchorTag = document.createElement('a');
				document.body.appendChild(anchorTag);
//   			    document.getElementById('previewImg').appendChild(canvas);
				anchorTag.download = 'sieunhantrieu.png';
				anchorTag.href = canvas.toDataURL('image/png');
				anchorTag.target = '_blank';
				anchorTag.click();
			   
			});
	
  });