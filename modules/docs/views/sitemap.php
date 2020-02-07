<?php
	$app = new Atom();
?>
<div class="container">
	<h3>Arquivos e Diretórios</h3>
	<div class="tree ">
		<ul>
			<li>
				<span>
					<a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#atomo-framework" aria-expanded="true" aria-controls="atomo-framework">
						<i class="collapsed">
							<i class="fas fa-atom"></i>
						</i>
						<i class="expanded">
							<i class="far fa-folder-open"></i>
						</i> <?=$app->getConfig('folder'); ?>
					</a>
				</span>

				<div id="atomo-framework" class="collapse show">
					
					<ul>
						
						<li>
							<span>
								<a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#pageApp" aria-expanded="false" aria-controls="page1">
									<i class="collapsed">
										<i class="fas fa-folder"></i>
									</i>
									<i class="expanded">
										<i class="far fa-folder-open"></i>
									</i> app
								</a>
							</span>
							<ul>
								<div id="pageApp" class="collapse">
									<li><span><i class="fab fa-php"></i> documentation.php</span></li>
								</div>
							</ul>
						</li>

						<li>
							<span>
								<a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#pageCore" aria-expanded="false" aria-controls="page1">
									<i class="collapsed">
										<i class="fas fa-folder"></i>
									</i>
									<i class="expanded">
										<i class="far fa-folder-open"></i>
									</i> core
								</a>
							</span>
							<ul>
								<div id="pageCore" class="collapse">

									<li>
										<span>
											<a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#pageConfig" aria-expanded="false" aria-controls="page1">
												<i class="collapsed">
													<i class="fas fa-folder"></i>
												</i>
												<i class="expanded">
													<i class="far fa-folder-open"></i>
												</i> config
											</a>
										</span>
										<ul>
											<div id="pageConfig" class="collapse">
												<li><span><i class="fab fa-js"></i><a href="#!"> config.json</a></span></li>
											</div>
										</ul>
									</li>

									<li>
										<span>
											<a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#pageSrc" aria-expanded="false" aria-controls="page1">
												<i class="collapsed">
													<i class="fas fa-folder"></i>
												</i>
												<i class="expanded">
													<i class="far fa-folder-open"></i>
												</i> src
											</a>
										</span>
										<ul>
											<div id="pageSrc" class="collapse">
												<li><span><i class="fab fa-php"></i> Atom.php</span></li>
												<li><span><i class="fab fa-php"></i> AtomException.php</span></li>
												<li><span><i class="fab fa-php"></i> Connect.php</span></li>
												<li><span><i class="fab fa-php"></i> DBSQL.php</span></li>
												<li><span><i class="fab fa-php"></i> Helper.php</span></li>
												<li><span><i class="fab fa-php"></i> Import.php</span></li>
												<li><span><i class="fab fa-php"></i> Module.php</span></li>
												<li><span><i class="fab fa-php"></i> Rest.php</span></li>
												<li><span><i class="fab fa-php"></i> Session.php</span></li>
												<li><span><i class="fab fa-php"></i> Upload.php</span></li>
											</div>
										</ul>
									</li>
									<li>
										<span>
											<i class="far fa-file"></i>
											bootstrap.php
										</span>
									</li>
									<li>
										<span>
											<i class="far fa-file"></i>
											.htaccess
										</span>
									</li>
								</div>
							</ul>
						</li>

						<li>
							<span>
								<a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#pageIncludes" aria-expanded="false" aria-controls="page1">
									<i class="collapsed">
										<i class="fas fa-folder"></i>
									</i>
									<i class="expanded">
										<i class="far fa-folder-open"></i>
									</i> includes
								</a>
							</span>
							<ul>
								<div id="pageIncludes" class="collapse">
									<li><span>// Diretório destinado a armazenamento de componentes que serão incluidos parcialmente</span></li>
								</div>
							</ul>
						</li>

						<li>
							<span>
								<a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#pageModules" aria-expanded="false" aria-controls="page1">
									<i class="collapsed">
										<i class="fas fa-folder"></i>
									</i>
									<i class="expanded">
										<i class="far fa-folder-open"></i>
									</i> modules
								</a>
							</span>
							<ul>
								<div id="pageModules" class="collapse">
									<li>
										<span>
											<a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#pageDocs" aria-expanded="false" aria-controls="page1">
												<i class="collapsed">
													<i class="fas fa-folder"></i>
												</i>
												<i class="expanded">
													<i class="far fa-folder-open"></i>
												</i> docs
											</a>
										</span>
										<ul>
											<div id="pageDocs" class="collapse">
												<li>
													<span>
														<a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#pageControllers" aria-expanded="false" aria-controls="page1">
															<i class="collapsed">
																<i class="fas fa-folder"></i>
															</i>
															<i class="expanded">
																<i class="far fa-folder-open"></i>
															</i> controllers
														</a>
													</span>
													<ul>
														<div id="pageControllers" class="collapse">
															<li><span>// arquivos de controle - seguindo o padrão MVC</span></li>
														</div>
													</ul>
												</li>
												<li>
													<span>
														<a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#pageModels" aria-expanded="false" aria-controls="page1">
															<i class="collapsed">
																<i class="fas fa-folder"></i>
															</i>
															<i class="expanded">
																<i class="far fa-folder-open"></i>
															</i> models
														</a>
													</span>
													<ul>
														<div id="pageModels" class="collapse">
															<li><span>// arquivos de modelo- seguindo o padrão MVC</span></li>
														</div>
													</ul>
												</li>
												<li>
													<span>
														<a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#pageViews" aria-expanded="false" aria-controls="page1">
															<i class="collapsed">
																<i class="fas fa-folder"></i>
															</i>
															<i class="expanded">
																<i class="far fa-folder-open"></i>
															</i> views
														</a>
													</span>
													<ul>
														<div id="pageViews" class="collapse">
															<li><span>// arquivos de visão e templates - seguindo o padrão MVC</span></li>
														</div>
													</ul>
												</li>
												<li><span><i class="fab fa-js"></i> define.json</span></li>
												<li><span><i class="fab fa-php"></i> helpers.php</span></li>
												<li><span><i class="fab fa-php"></i> validate.php</span></li>
											</div>
										</ul>
									</li>
								</div>
							</ul>
						</li>
						<li>
							<span>
								<a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#pagePublic" aria-expanded="false" aria-controls="page1">
									<i class="collapsed">
										<i class="fas fa-folder"></i>
									</i>
									<i class="expanded">
										<i class="far fa-folder-open"></i>
									</i> public
								</a>
							</span>
							<ul>
								<div id="pagePublic" class="collapse">

									<li>
										<span>
											<a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#pagePublicDocs" aria-expanded="false" aria-controls="page1">
												<i class="collapsed">
													<i class="fas fa-folder"></i>
												</i>
												<i class="expanded">
													<i class="far fa-folder-open"></i>
												</i> docs
											</a>
										</span>
										<ul>
											<div id="pagePublicDocs" class="collapse">
												<li>
													<span>
														<a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#pagePublicDocsCss" aria-expanded="false" aria-controls="page1">
															<i class="collapsed">
																<i class="fas fa-folder"></i>
															</i>
															<i class="expanded">
																<i class="far fa-folder-open"></i>
															</i> css
														</a>
													</span>
													<ul>
														<div id="pagePublicDocsCss" class="collapse">
															<li><span>// arquivos css do template docs</span></li>
														</div>
													</ul>
												</li>
												<li>
													<span>
														<a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#pagePublicDocsJs" aria-expanded="false" aria-controls="page1">
															<i class="collapsed">
																<i class="fas fa-folder"></i>
															</i>
															<i class="expanded">
																<i class="far fa-folder-open"></i>
															</i> js
														</a>
													</span>
													<ul>
														<div id="pagePublicDocsJs" class="collapse">
															<li><span>// arquivos js do template docs</span></li>
														</div>
													</ul>
												</li>

												<li>
													<span>
														<a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#pagePublicDocsImg" aria-expanded="false" aria-controls="page1">
															<i class="collapsed">
																<i class="fas fa-folder"></i>
															</i>
															<i class="expanded">
																<i class="far fa-folder-open"></i>
															</i> img
														</a>
													</span>
													<ul>
														<div id="pagePublicDocsImg" class="collapse">
															<li><span>// imagens do template docs</span></li>
														</div>
													</ul>
												</li>
											</div>
										</ul>
									</li>
								</div>
							</ul>
						</li>
						<li>
							<span>
								<a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#pageStorage" aria-expanded="false" aria-controls="page1">
									<i class="collapsed">
										<i class="fas fa-folder"></i>
									</i>
									<i class="expanded">
										<i class="far fa-folder-open"></i>
									</i> storage
								</a>
							</span>
							<ul>
								<div id="pageStorage" class="collapse">
									<li><span>// Diretório destinado a armazenamento de arquivos da aplicação</span></li>
								</div>
							</ul>
						</li>
						<li>
							<span>
								<i class="fab fa-php"></i>
								index.php
							</span>
						</li>
						<li>
							<span>
								<i class="far fa-file"></i>
								.htaccess
							</span>
						</li>
					</ul>
				</div>
			</li>
		</ul>
	</div>

	<hr>

	<h3>Url -controle de uri</h3>
</div>
