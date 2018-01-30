<?php
if(!$_SESSION['login']) {
    echo ('
                    <div class="wrapper">

                        <div class="pop-up">
                            <div class="pop-up-text">
                                <div class="container-fluid">
                                    <form id="form" method="POST" action="./login.php">
            
                                        
                                        <input class="col-xs-12" name=\'email\' id="email-login" type="text" placeholder="Pseudo ou E-MAIL">
                                        <input class="col-xs-12" name=\'MDP\' id="password-login" type="password" placeholder="PASSWORD">
            
                                        <input class="col-xs-12 submit" id="submit-login" type="submit" value="GO!">
                                        <a href="./reset_pass.php">Mot de passe oublié ? </a>
            
                                    </form>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="wrapper-two" style="display:none">
             
                       <div class="pop-up-two">
                           <div class="pop-up-text">
                               <div class="container-fluid">
                                   <form id="form" method="POST" action="./signup.php">
            
                                       <input class="col-xs-12" name=pseudo id="pseudo-signup" type="text" placeholder="PSEUDO">
                                       <input class="col-xs-12" name=email id="email-signup" type="text" placeholder="E-MAIL">
                                       <input class="col-xs-12" name=MDP id="password-signup" type="text" placeholder="PASSWORD">
                                       <input class="col-xs-12" name=MDP id="password-signup-repeat" type="text" placeholder="REPEAT PASSWORD">
                                       <input class="col-xs-12 submit" id="submit-signup" type="submit" value="REGISTER">
            
                                    </form>
                                </div>
                            </div>
                       </div>
                    </div>
                ');
} else {
    echo ('
                <div class="wrapper">

                        <div class="pop-up">
                            <div class="pop-up-text">
                                <div class="container-fluid">
                                    <form id="form" method="POST" action="./article.php">
            
                                        
                                        <input class="col-xs-12" name=\'titre\' id="titre" type="text" placeholder="titre">
                                        <label><input type="checkbox" name="categorie[]" value="trending">Trending</label>
                                        <label><input type="checkbox" name="categorie[]" value="food">Food</label>
                                        <label><input type="checkbox" name="categorie[]" value="money">Money</label>
                                        <label><input type="checkbox" name="categorie[]" value="fun">Fun</label> 
                                        <label><input type="checkbox" name="categorie[]" value="Technology">Technology</label>
                                        <label><input type="checkbox" name="categorie[]" value="Travel">Travel</label>
                                                                                 
                                   
                                        <textarea class="col-xs-12" name=\'contenu\' id="contenu-article"> </textarea>
                                      
            
                                        <input class="col-xs-12 submit" id="submit-article" type="submit" value="Publier !">
            
                                    </form>
                                </div> 
                            </div>
                        </div>
                </div>
                
                <div class="wrapper-two" style="display:none">
             
                       <div class="pop-up-two">
                           <div class="pop-up-text">
                               <div class="container-fluid">
                                   <form class="form-comment" method="POST" action="./comment.php">
            
                                        <input type="text" name="articleId" class="article-id">
                                       <textarea class="col-xs-12" name=\'commentaire\' id="commentaire"> </textarea>
                                       
                                       <input class="col-xs-12 submit" id="submit-comment" type="submit" value="COMMENTER">
            
                                    </form>
                                </div>
                            </div>
                       </div>
                </div>
                    ');

}