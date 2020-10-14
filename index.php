<?php
/*   
Theme Name: matador
*/
$img_way = get_template_directory_uri().'/img/';

        $posts = get_posts( array(
            'orderby'     => 'date',
            'order'       => 'ASC',
            'include'     => array(),
            'exclude'     => array(),
            'meta_key'    => '',
            'meta_value'  =>'',
            'post_type'   => 'bookmakers',
            'suppress_filters' => true,
        ) );

$raw_currencies = get_terms( 'valuti', ['hide_empty' => false,] );

foreach($raw_currencies as $one_currency)
	{
	$currency[$one_currency->term_id] = $one_currency->name;
	}
		
?>

<?php get_header(); ?>
<main>
	<div class="wrapper">
		<div class="all_bookmakers_list">
			<?php 
		if(isset($posts) && count($posts) > 0)
			{
			foreach($posts as $one_post)
				{ 
				$cust_fields =  get_post_custom( $one_post->ID );
				$taxonomies = get_terms( 'valuti', ['hide_empty' => false,] );
			?>
			<div class="one_bookmaker">
				<div class="info_zone">
					<div class="post_big_image">
						<img class="big_img" src="<?php echo $img_way.'1x.png';?>">
						<div class="medals all_btn">Букмекер месяца</div>
						<div class="medals all_btn">Щедрые бонусы</div>
					</div>
					<div class="post_info">
						<div class="post_title">
							<span class="title_hello">Приветственный</span>
							<div class="title_text">
								<div class="post_small_image">
									<img class="small_img" src="<?php echo $img_way.'1x.png';?>">
								</div>
								<div class="title_string"><?php echo $one_post->post_title; ?></div>
							</div>
						</div>
						<div class="post_info_details">
							<div class="main_info">
								<div class="main_info_coll coll1">
									<div class="main_info_subinfo">
										<div class="main_info_subinfo_title">Макс. сумма:</div>
										<div class="main_info_subinfo_value">
											<?php 
											echo number_format($cust_fields['max_month_value'][0], 0, '', ' ')
													.' '
													.$currency[$cust_fields['max_month_currency'][0]]; 
											?> 
										</div>
									</div>
									<div class="main_info_subinfo">
										<div class="main_info_subinfo_title">Мин. депозит:</div>
										<div class="main_info_subinfo_value">
											<?php 
											echo number_format($cust_fields['min_day_value'][0], 0, '', ' ')
													.' '
													.$currency[$cust_fields['min_day_currency'][0]]; 
											?> 
										</div>
									</div>
								</div>
								<div class="main_info_coll coll2">
									<div class="main_info_subinfo">
										<div class="main_info_subinfo_title">Быстрые выплаты:</div>
										<div class="main_info_subinfo_value">нет</div>
									</div>
									<div class="main_info_subinfo">
										<div class="main_info_subinfo_title">Кэшбек:</div>
										<div class="main_info_subinfo_value">50%</div>
									</div>
								</div>
								<div class="main_info_coll coll3">
									<div class="main_info_subinfo actual">
										<div class="main_info_subinfo_title">Действителен:</div>
										<div class="main_info_subinfo_value">до 31 ноября</div>
									</div>
									<div class="main_info_subinfo bonus_code">
										<div class="main_info_subinfo_title">Бонус код</div>
										<div class="main_info_subinfo_value">нет</div>
									</div>
								</div>
							</div>
							<div class="post_buttons">
								<div class="post_button_name all_btn">1хСтавка</div>
								<div class="post_button_bonus all_btn">Все Бонусы (999)</div>
								<div class="post_button_get all_btn">Получить</div>
							</div>
						</div>
					</div>
				</div>
				<div class="comment_zone">
					<span class="comment_text all_btn" onclick="my_32167_slider(this)">Условия получения</span>
					<div class="hidden_comments" style="display: none;">
						<?php echo $one_post->post_content; ?>
					</div>
				</div>
			</div>
			<?php 
				}
			}
		else
			{
			echo '<h3>Нет постов</h3>';
			}
			
			?>
		</div>
		<div class="sidebar">
			<div class="best_bookmakers_list">
				<div class="best_bookmakers_header">
					лучшие букмекеры
				</div>
				<div class="best_bookmakers_content">
					<div class="best_bookmakers_one">
						<div class="best_bookmakers_one_img">
							<img class="best_bookmakers_img" src="<?php echo $img_way.'bwin.png';?>">
						</div>
						<div class="best_bookmakers_one_content">
							<div class="best_bookmakers_one_row_info">
								<div class="best_bookmakers_one_row_col">
									<p class="best_bookmakers_name">Bwin</p>
									<span class="best_bookmakers_comment">Бонус до 3000 RUB</span>
								</div>
								<div class="best_bookmakers_one_row_col">
									<div class="best_bookmakers_rating">
										<svg width="64" height="30" viewBox="0 0 64 30" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect width="64" height="30" rx="3" fill="#FAAB00"/>
											<path d="M39.41 19.218V21H37.088V19.218H31.904V17.364L35.882 8.598H38.312L34.46 17.166H37.088V13.62H39.41V17.166H40.418V19.218H39.41ZM43.5352 21.126C43.1272 21.126 42.7852 20.982 42.5092 20.694C42.2452 20.406 42.1132 20.058 42.1132 19.65C42.1132 19.266 42.2452 18.942 42.5092 18.678C42.7852 18.402 43.1212 18.264 43.5172 18.264C43.9252 18.264 44.2612 18.402 44.5252 18.678C44.8012 18.942 44.9392 19.266 44.9392 19.65C44.9392 20.046 44.8132 20.394 44.5612 20.694C44.3092 20.982 43.9672 21.126 43.5352 21.126ZM54.2108 19.218V21H51.8888V19.218H46.7048V17.364L50.6828 8.598H53.1128L49.2608 17.166H51.8888V13.62H54.2108V17.166H55.2188V19.218H54.2108Z" fill="white"/>
											<path d="M15.6397 6.59094L13.4718 10.9865L8.62146 11.6936C7.75165 11.8198 7.40306 12.8921 8.03384 13.5063L11.543 16.9258L10.713 21.7562C10.5636 22.6294 11.4832 23.2834 12.2534 22.8751L16.5925 20.5943L20.9317 22.8751C21.7019 23.2801 22.6215 22.6294 22.4721 21.7562L21.6421 16.9258L25.1512 13.5063C25.782 12.8921 25.4334 11.8198 24.5636 11.6936L19.7132 10.9865L17.5454 6.59094C17.1569 5.80744 16.0315 5.79748 15.6397 6.59094Z" fill="white"/>
										</svg>
									</div>
								</div>
							</div>
							<div class="best_bookmakers_one_row_button all_btn">
								сделать ставку
							</div>
						</div>
					</div>
					<div class="best_bookmakers_one">
						<div class="best_bookmakers_one_img">
							<img class="best_bookmakers_img" src="<?php echo $img_way.'bwin.png';?>">
						</div>
						<div class="best_bookmakers_one_content">
							<div class="best_bookmakers_one_row_info">
								<div class="best_bookmakers_one_row_col">
									<p class="best_bookmakers_name">Bwin</p>
									<span class="best_bookmakers_comment">Бонус до 3000 RUB</span>
								</div>
								<div class="best_bookmakers_one_row_col">
									<div class="best_bookmakers_rating">
										<svg width="64" height="30" viewBox="0 0 64 30" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect width="64" height="30" rx="3" fill="#FAAB00"/>
											<path d="M39.41 19.218V21H37.088V19.218H31.904V17.364L35.882 8.598H38.312L34.46 17.166H37.088V13.62H39.41V17.166H40.418V19.218H39.41ZM43.5352 21.126C43.1272 21.126 42.7852 20.982 42.5092 20.694C42.2452 20.406 42.1132 20.058 42.1132 19.65C42.1132 19.266 42.2452 18.942 42.5092 18.678C42.7852 18.402 43.1212 18.264 43.5172 18.264C43.9252 18.264 44.2612 18.402 44.5252 18.678C44.8012 18.942 44.9392 19.266 44.9392 19.65C44.9392 20.046 44.8132 20.394 44.5612 20.694C44.3092 20.982 43.9672 21.126 43.5352 21.126ZM54.2108 19.218V21H51.8888V19.218H46.7048V17.364L50.6828 8.598H53.1128L49.2608 17.166H51.8888V13.62H54.2108V17.166H55.2188V19.218H54.2108Z" fill="white"/>
											<path d="M15.6397 6.59094L13.4718 10.9865L8.62146 11.6936C7.75165 11.8198 7.40306 12.8921 8.03384 13.5063L11.543 16.9258L10.713 21.7562C10.5636 22.6294 11.4832 23.2834 12.2534 22.8751L16.5925 20.5943L20.9317 22.8751C21.7019 23.2801 22.6215 22.6294 22.4721 21.7562L21.6421 16.9258L25.1512 13.5063C25.782 12.8921 25.4334 11.8198 24.5636 11.6936L19.7132 10.9865L17.5454 6.59094C17.1569 5.80744 16.0315 5.79748 15.6397 6.59094Z" fill="white"/>
										</svg>
									</div>
								</div>
							</div>
							<div class="best_bookmakers_one_row_button all_btn">
								сделать ставку
							</div>
						</div>
					</div>
					<div class="best_bookmakers_one">
						<div class="best_bookmakers_one_img">
							<img class="best_bookmakers_img" src="<?php echo $img_way.'bwin.png';?>">
						</div>
						<div class="best_bookmakers_one_content">
							<div class="best_bookmakers_one_row_info">
								<div class="best_bookmakers_one_row_col">
									<p class="best_bookmakers_name">Bwin</p>
									<span class="best_bookmakers_comment">Бонус до 3000 RUB</span>
								</div>
								<div class="best_bookmakers_one_row_col">
									<div class="best_bookmakers_rating">
										<svg width="64" height="30" viewBox="0 0 64 30" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect width="64" height="30" rx="3" fill="#FAAB00"/>
											<path d="M39.41 19.218V21H37.088V19.218H31.904V17.364L35.882 8.598H38.312L34.46 17.166H37.088V13.62H39.41V17.166H40.418V19.218H39.41ZM43.5352 21.126C43.1272 21.126 42.7852 20.982 42.5092 20.694C42.2452 20.406 42.1132 20.058 42.1132 19.65C42.1132 19.266 42.2452 18.942 42.5092 18.678C42.7852 18.402 43.1212 18.264 43.5172 18.264C43.9252 18.264 44.2612 18.402 44.5252 18.678C44.8012 18.942 44.9392 19.266 44.9392 19.65C44.9392 20.046 44.8132 20.394 44.5612 20.694C44.3092 20.982 43.9672 21.126 43.5352 21.126ZM54.2108 19.218V21H51.8888V19.218H46.7048V17.364L50.6828 8.598H53.1128L49.2608 17.166H51.8888V13.62H54.2108V17.166H55.2188V19.218H54.2108Z" fill="white"/>
											<path d="M15.6397 6.59094L13.4718 10.9865L8.62146 11.6936C7.75165 11.8198 7.40306 12.8921 8.03384 13.5063L11.543 16.9258L10.713 21.7562C10.5636 22.6294 11.4832 23.2834 12.2534 22.8751L16.5925 20.5943L20.9317 22.8751C21.7019 23.2801 22.6215 22.6294 22.4721 21.7562L21.6421 16.9258L25.1512 13.5063C25.782 12.8921 25.4334 11.8198 24.5636 11.6936L19.7132 10.9865L17.5454 6.59094C17.1569 5.80744 16.0315 5.79748 15.6397 6.59094Z" fill="white"/>
										</svg>
									</div>
								</div>
							</div>
							<div class="best_bookmakers_one_row_button all_btn">
								сделать ставку
							</div>
						</div>
					</div>
					<div class="best_bookmakers_one show_more">
						Посмотреть все >
					</div>
				</div>
			</div>
			<div class="best_bookmakers_list">
				<div class="best_bookmakers_header">
					последние отзывы
				</div>
				<div class="best_bookmakers_content">
					<div class="one_comment">
						<div class="comment_header">
							<div class="bookmakers_comment_name">William Hill</div>
							<div class="bookmakers_comment_rating">
								<svg width="64" height="30" viewBox="0 0 64 30" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect width="64" height="30" rx="3" fill="#FAAB00"/>
									<path d="M39.41 19.218V21H37.088V19.218H31.904V17.364L35.882 8.598H38.312L34.46 17.166H37.088V13.62H39.41V17.166H40.418V19.218H39.41ZM43.5352 21.126C43.1272 21.126 42.7852 20.982 42.5092 20.694C42.2452 20.406 42.1132 20.058 42.1132 19.65C42.1132 19.266 42.2452 18.942 42.5092 18.678C42.7852 18.402 43.1212 18.264 43.5172 18.264C43.9252 18.264 44.2612 18.402 44.5252 18.678C44.8012 18.942 44.9392 19.266 44.9392 19.65C44.9392 20.046 44.8132 20.394 44.5612 20.694C44.3092 20.982 43.9672 21.126 43.5352 21.126ZM54.2108 19.218V21H51.8888V19.218H46.7048V17.364L50.6828 8.598H53.1128L49.2608 17.166H51.8888V13.62H54.2108V17.166H55.2188V19.218H54.2108Z" fill="white"/>
									<path d="M15.6397 6.59094L13.4718 10.9865L8.62146 11.6936C7.75165 11.8198 7.40306 12.8921 8.03384 13.5063L11.543 16.9258L10.713 21.7562C10.5636 22.6294 11.4832 23.2834 12.2534 22.8751L16.5925 20.5943L20.9317 22.8751C21.7019 23.2801 22.6215 22.6294 22.4721 21.7562L21.6421 16.9258L25.1512 13.5063C25.782 12.8921 25.4334 11.8198 24.5636 11.6936L19.7132 10.9865L17.5454 6.59094C17.1569 5.80744 16.0315 5.79748 15.6397 6.59094Z" fill="white"/>
								</svg>
							</div>
						</div>
						<div class="comment_link">
							Играю со смарта все очень удобно без вылетов и зависаний, вывод средств можно сказать мгновенный... 
							<a href="#">Читать далее</a>
						</div>
						<div class="comment_data">
							<div>
								<span>
									<img src="<?php echo $img_way.'man.png';?>">
								</span>
								<span class="comment_from">Сергей Аржаков</span>
							</div>
							<div>
								<span>
									<img src="<?php echo $img_way.'clock.png';?>">
								</span>
								<span class="comment_from">1 сентября 2019</span>
							</div>
						</div>
					</div>
					<div class="one_comment">
						<div class="comment_header">
							<div class="bookmakers_comment_name">William Hill</div>
							<div class="bookmakers_comment_rating">
								<svg width="64" height="30" viewBox="0 0 64 30" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect width="64" height="30" rx="3" fill="#FAAB00"/>
									<path d="M39.41 19.218V21H37.088V19.218H31.904V17.364L35.882 8.598H38.312L34.46 17.166H37.088V13.62H39.41V17.166H40.418V19.218H39.41ZM43.5352 21.126C43.1272 21.126 42.7852 20.982 42.5092 20.694C42.2452 20.406 42.1132 20.058 42.1132 19.65C42.1132 19.266 42.2452 18.942 42.5092 18.678C42.7852 18.402 43.1212 18.264 43.5172 18.264C43.9252 18.264 44.2612 18.402 44.5252 18.678C44.8012 18.942 44.9392 19.266 44.9392 19.65C44.9392 20.046 44.8132 20.394 44.5612 20.694C44.3092 20.982 43.9672 21.126 43.5352 21.126ZM54.2108 19.218V21H51.8888V19.218H46.7048V17.364L50.6828 8.598H53.1128L49.2608 17.166H51.8888V13.62H54.2108V17.166H55.2188V19.218H54.2108Z" fill="white"/>
									<path d="M15.6397 6.59094L13.4718 10.9865L8.62146 11.6936C7.75165 11.8198 7.40306 12.8921 8.03384 13.5063L11.543 16.9258L10.713 21.7562C10.5636 22.6294 11.4832 23.2834 12.2534 22.8751L16.5925 20.5943L20.9317 22.8751C21.7019 23.2801 22.6215 22.6294 22.4721 21.7562L21.6421 16.9258L25.1512 13.5063C25.782 12.8921 25.4334 11.8198 24.5636 11.6936L19.7132 10.9865L17.5454 6.59094C17.1569 5.80744 16.0315 5.79748 15.6397 6.59094Z" fill="white"/>
								</svg>
							</div>
						</div>
						<div class="comment_link">
							Играю со смарта все очень удобно без вылетов и зависаний, вывод средств можно сказать мгновенный... 
							<a href="#">Читать далее</a>
						</div>
						<div class="comment_data">
							<div>
								<span>
									<img src="<?php echo $img_way.'man.png';?>">
								</span>
								<span class="comment_from">Сергей Аржаков</span>
							</div>
							<div>
								<span>
									<img src="<?php echo $img_way.'clock.png';?>">
								</span>
								<span class="comment_from">1 сентября 2019</span>
							</div>
						</div>
					</div>
					<div class="best_bookmakers_one show_more">
						Посмотреть все >
					</div>
				</div>
				
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>