<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
	<div class="container-xxl flex-grow-1 container-p-y">
		<div class="row">
			<!-- Main Container -->
			<div class="col-lg-7 mb-4 order-0">
				<!-- Congratulations Card -->
				<div class="card">
					<div class="d-flex align-items-end row">
					<div class="col-sm-7">
						<div class="card-body">
						<h5 class="card-title text-primary">Congratulations {{ $user->name }}! 🎉</h5>
						<p class="mb-4">
							You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
							your profile.
						</p>
						<a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
						</div>
					</div>
					<div class="col-sm-5 text-center text-sm-left">
						<div class="card-body pb-0 px-0 px-md-4">
						<img
							src="{{ asset('build/assets/dashboard/img/illustrations/man-with-laptop-light.png') }}"
							height="140"
							alt="View Badge User"
							data-app-dark-img="illustrations/man-with-laptop-dark.png"
							data-app-light-img="illustrations/man-with-laptop-light.png"
						/>
						</div>
					</div>
					</div>
				</div>

			<!-- Timeline Section -->
			<div class="card mt-4">
				<div class="card-body">
					<div class="timeline-body">
						
							<div class="timeline-comment-box mt-3">
							<div class="user">
								<img src="{{ $user->profile_photo_path ?
								(Str::startsWith($user->profile_photo_path, ['http', 'https']) ?
									$user->profile_photo_path :
									asset($user->profile_photo_path)
								) :
								asset('build/assets/images/Liza-happy-cat-with-laptop-in-christmas-costume-drinking-tea-2f6120ee-b8e0-4f56-8d70-e0bad66f07ee-1.jpg')
							}}" alt>
							</div>
							<div class="input flex-grow-1">
								<form action>
									<div class="input-group">
										<input type="text" class="form-control rounded-corner" placeholder="What's on your mind?">
										<div class="input-group-append">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Repeat Timeline for additional posts if needed -->
				
				<!-- Timeline Section -->
				<div class="card mt-4">
					<div class="card-body">
						<div class="timeline-body">
							<div class="timeline-header">
								<div class="d-flex align-items-center">
									<div class="userimage">
									<img src="https://source.unsplash.com/random" alt>
									</div>
									<div class="username">
									<a href="javascript:;">Sean Ngu</a>
									</div>
								</div>
									<span class="text-muted">18 Views</span>
							</div>
								<div class="timeline-content mt-3">
									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc
										faucibus turpis quis tincidunt luctus.
										Nam sagittis dui in nunc consequat, in imperdiet nunc sagittis.
									</p>
								</div>
								<div class="timeline-likes mt-3 d-flex justify-content-end">
									<div class="stats-right">
										<span class="stats-text">3.3K Likes</span>
										<span class="stats-text">259 Shares</span>
										<span class="stats-text">21 Comments</span>
									</div>
								</div>
								<div class="timeline-footer mt-3">
									<a href="javascript:;" class="text-secondary mr-3"><i class="fa fa-thumbs-up fa-fw fa-lg mr-2"></i> Like</a>
									<a href="javascript:;" class="text-secondary mr-3"><i class="fa fa-comments fa-fw fa-lg mr-2"></i> Comment</a>
									<a href="javascript:;" class="text-secondary"><i class="fa fa-share fa-fw fa-lg mr-2"></i> Share</a>
								</div>
								<div class="timeline-comment-box mt-3">
								<div class="user">
									<img src="{{ $user->profile_photo_path ?
								(Str::startsWith($user->profile_photo_path, ['http', 'https']) ?
									$user->profile_photo_path :
									asset($user->profile_photo_path)
								) :
								asset('build/assets/images/Liza-happy-cat-with-laptop-in-christmas-costume-drinking-tea-2f6120ee-b8e0-4f56-8d70-e0bad66f07ee-1.jpg')
							}}" alt>
								</div>
								<div class="input flex-grow-1">
									<form action>
									<div class="input-group">
										<input type="text" class="form-control rounded-corner" placeholder="Write a comment...">
										<div class="input-group-append">
										<button class="btn btn-primary f-s-12 rounded-corner" type="button">Comment</button>
										</div>
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Timeline Section -->
				<div class="card mt-4">
					<div class="card-body">
						<div class="timeline-body">
							<div class="timeline-header">
								<div class="d-flex align-items-center">
									<div class="userimage">
									<img src="https://source.unsplash.com/random" alt>
									</div>
									<div class="username">
									<a href="javascript:;">Sean Ngu</a>
									</div>
								</div>
									<span class="text-muted">18 Views</span>
							</div>
								<div class="timeline-content mt-3">
									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc
										faucibus turpis quis tincidunt luctus.
										Nam sagittis dui in nunc consequat, in imperdiet nunc sagittis.
									</p>
								</div>
								<div class="timeline-likes mt-3 d-flex justify-content-end">
									<div class="stats-right">
										<span class="stats-text">3.3K Likes</span>
										<span class="stats-text">259 Shares</span>
										<span class="stats-text">21 Comments</span>
									</div>
								</div>
								<div class="timeline-footer mt-3">
									<a href="javascript:;" class="text-secondary mr-3"><i class="fa fa-thumbs-up fa-fw fa-lg mr-2"></i> Like</a>
									<a href="javascript:;" class="text-secondary mr-3"><i class="fa fa-comments fa-fw fa-lg mr-2"></i> Comment</a>
									<a href="javascript:;" class="text-secondary"><i class="fa fa-share fa-fw fa-lg mr-2"></i> Share</a>
								</div>
								<div class="timeline-comment-box mt-3">
								<div class="user">
									<img src="{{ $user->profile_photo_path ?
										(Str::startsWith($user->profile_photo_path, ['http', 'https']) ?
											$user->profile_photo_path :
											asset($user->profile_photo_path)
										) :
										asset('build/assets/images/Liza-happy-cat-with-laptop-in-christmas-costume-drinking-tea-2f6120ee-b8e0-4f56-8d70-e0bad66f07ee-1.jpg')
									}}" alt>
								</div>
								<div class="input flex-grow-1">
									<form action>
									<div class="input-group">
										<input type="text" class="form-control rounded-corner" placeholder="Write a comment...">
										<div class="input-group-append">
										<button class="btn btn-primary f-s-12 rounded-corner" type="button">Comment</button>
										</div>
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="text-center mt-4 mb-1">
					<h3 class="card-title"> Loading... </h3>
				</div>
				
			</div>

			<!-- Aside Container -->
			<div class="col-lg-5 col-md-4 order-1 aside" >
			  <div class="card">
				<div class="card-body">
				  <h4 class="card-title">Profile Card</h4>
				  <div class="d-flex align-items-center" style="margin-left: -10px;">
					<div class="image" style="margin-right: 5px;">
					  <img src="{{ $user->profile_photo_path ?
								(Str::startsWith($user->profile_photo_path, ['http', 'https']) ?
									$user->profile_photo_path :
									asset($user->profile_photo_path)
								) :
								asset('build/assets/images/Liza-happy-cat-with-laptop-in-christmas-costume-drinking-tea-2f6120ee-b8e0-4f56-8d70-e0bad66f07ee-1.jpg')
							}}" class="rounded">
					</div>
					<div class="ml-3 w-100">
					  <h4 class="mb-0 mt-0">{{ $user->name }}</h4>
					  <span>Recruiter</span>
					  <div class="p-2 mt-1 d-flex justify-content-between rounded stats">
						<div class="d-flex flex-column text-center">
						  <span class="articles">Articles</span>
						  <span class="number1">38</span>
						</div>
						<div class="d-flex flex-column text-center">
						  <span class="followers">Followers</span>
						  <span class="number2">980</span>
						</div>
						<div class="d-flex flex-column text-center">
						  <span class="rating">Following</span>
						  <span class="number3">1.1K</span>
						</div>
					  </div>
					  <div class="profile_button mt-2 d-flex flex-row align-items-center">
						<button class="btn btn-sm btn-outline-primary">Share</button>
						<button class="btn btn-sm btn-primary ml-2">Update</button>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			</div>
		</div>
	</div>
</div>
