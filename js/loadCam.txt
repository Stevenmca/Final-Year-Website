var proxyUrl = 'https://cors-anywhere.herokuapp.com/';
var CameraUrl = 'http://trackfield.webcam.oregonstate.edu/';

			



(function() {
			$.ajax({ 
					url: proxyUrl + ModalLoadUrlTwo,
					success: function(response) 
					{ 
						$('.LoadCameraOne').html(response); 
						
					} 
					
					});
					
					
			 //Carousel Image Title One 
		 
			});

})();