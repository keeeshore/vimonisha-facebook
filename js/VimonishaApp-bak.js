$.ajax({
				  url: "../include/get-facebook-graph-data.php",
				  data: { 'fields': options.fields, 'id': options.id || 'VimonishaExhibitions' }
				}).done(function(response) {
					if (response && response.error) {
						alert(JSON.stringify(response));
					}
					
					$('#loaderBar').addClass('hidden');	
					cb(response);
				});