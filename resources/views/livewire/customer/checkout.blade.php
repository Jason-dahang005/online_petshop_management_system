<div>
    <!--====== Checkout Form Steps Part Start ======-->
    <section class="checkout-wrapper section">
			<div class="container">
				<form wire:submit.prevent="placeOrder">
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="checkout-steps-form-style-1">
								<ul id="accordionExample">
									<li>
										<h6 class="title">Shipping Address</h6>
										<section class="checkout-steps-form-content collapse show" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
											<div class="row">
												<div class="col-md-12">
													<div class="single-form form-default">
														<div class="row">
															<div class="col-md-6 form-input form">
																<label class="small">Full Name <span class="text-danger">*</span></label>
																<input type="text" placeholder="Enter Full Name" wire:model="fullname">
																@error('fullname')
																	<span class="text-danger">
																		{{ $message }}
																	</span>
																@enderror
															</div>
															<div class="col-md-6 form-input form">
																<label class="small">Mobile No. <span class="text-danger">*</span></label>
																<input type="text" placeholder="Enter Mobile No." wire:model="mobile">
																@error('mobile')
																<span class="text-danger">
																	{{ $message }}
																</span>
															@enderror
															</div>
														</div>
													</div>
													<div class="col-md-12">
														<div class="single-form form-default">
															<div class="row">
																<div class="col-md-12 form-input form">
																	<label class="small">House Number, Building and St. Name <span class="text-danger">*</span></label>
																	<input type="text" placeholder="Enter House Number, Building and St. Name" wire:model="address">
																	@error('address')
																	<span class="text-danger">
																		{{ $message }}
																	</span>
																@enderror
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="single-form form-default">
														<div class="form-input form">
															<label class="small">Province <span class="text-danger">*</span></label>
															<input type="text" placeholder="Enter Province Name" wire:model="province">
															@error('province')
															<span class="text-danger">
																{{ $message }}
															</span>
														@enderror
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="single-form form-default">
														<div class="form-input form">
															<label class="small">City/Municipality <span class="text-danger">*</span></label>
															<input type="text" placeholder="Enter City/Municipality Name" wire:model="city">
															@error('city')
															<span class="text-danger">
																{{ $message }}
															</span>
														@enderror
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="single-form form-default">
														<div class="form-input form">
															<label class="small">Barangay <span class="text-danger">*</span></label>
															<input type="text" placeholder="Enter Barangay Name" wire:model="barangay">
															@error('barangay')
															<span class="text-danger">
																{{ $message }}
															</span>
														@enderror
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="single-form form-default">
														<div class="form-input form">
															<label class="small">Zipcode <span class="text-danger">*</span></label>
															<input type="text" placeholder="Enter Zipcode Name" wire:model="zipcode">
															@error('zipcode')
															<span class="text-danger">
																{{ $message }}
															</span>
														@enderror
														</div>
													</div>
												</div>
											</div>
										</section>
									</li>
									<li>
										<h6 class="title collapsed" >Payment Info</h6>
										<section class="checkout-steps-form-content collapse show" id="collapsefive" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
											<div class="row">
												<div class="col-12">
													<div class="checkout-payment-form">
														<div class="single-form form-default">
															<label class="small">Cardholder Name <span class="text-danger">*</span></label>
															<div class="form-input form">
																<input type="text" placeholder="Cardholder Name">
															</div>
														</div>
														<div class="single-form form-default">
															<label class="small">Card Number <span class="text-danger">*</span></label>
															<div class="form-input form">
																<input id="credit-input" type="text" placeholder="0000 0000 0000 0000">
																<img src="assets/images/payment/card.png" alt="card">
															</div>
														</div>
														<div class="payment-card-info">
															<div class="single-form form-default mm-yy">
																<label class="small">Expiration <span class="text-danger">*</span></label>
																<div class="expiration d-flex">
																	<div class="form-input form">
																		<input type="text" placeholder="MM">
																	</div>
																	<div class="form-input form">
																		<input type="text" placeholder="YYYY">
																	</div>
																</div>
															</div>
															<div class="single-form form-default">
																<label class="small">CVC/CVV <span><i  class="mdi mdi-alert-circle"></i></span> <span class="text-danger">*</span></label>
																<div class="form-input form">
																	<input type="text" placeholder="***">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</section>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="checkout-sidebar">
								<div class="checkout-sidebar-price-table">
									<h5 class="title">Select Payment Method</h5>
									<div class="select-payment-method">
										<div class="payment-radio-btn">
											<label class="custom-control-label" for="customRadio1">Cash on Delivery <span class="text-danger">*</span></label>
											<input type="radio" id="payment-method-cod" name="payment-method" value="cod" class="custom-control-input" wire:model="paymentmode">
										</div>
										<div class="payment-radio-btn">
											<label class="custom-control-label" for="customRadio1">Debit/Credit Card <span class="text-danger">*</span></label>
											<input type="radio" id="payment-method-card" name="payment-method" value="card" class="custom-control-input" wire:model="paymentmode">
										</div>
									</div>
								</div>
								@if (Session::has('checkout'))
									<div class="checkout-sidebar-price-table mt-20">
										<h5 class="title">Order Summary</h5>
										<div class="sub-total-price">
											<div class="total-price">
												<p class="value">Subtotal:</p>
												<p class="price">₱{{ Session::get('checkout')['subtotal'] }}</p>
											</div>
											<div class="total-price shipping">
												<p class="value">Tax:</p>
												<p class="price">₱{{ Session::get('checkout')['tax'] }}</p>
											</div>
											<div class="total-price discount">
												<p class="value">Shipping:</p>
												<p class="price">Free Shipping</p>
											</div>
										</div>
										<div class="total-payable">
											<div class="payable-price">
												<p class="value">Total:</p>
												<p class="price">₱{{ Session::get('checkout')['total'] }}</p>
											</div>
										</div>
										<div class="price-table-btn button">
											<button type="submit" class="btn btn-alt w-100">Place Order</button>
										</div>
									</div>
								@endif
							</div>
						</div>
					</div>
				</form>
			</div>
    </section>
    <!--====== Checkout Form Steps Part Ends ======-->
</div>