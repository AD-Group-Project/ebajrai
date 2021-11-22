<!DOCTYPE html>
    <html> 
    <head>
        <style>
            footer
            {
                position: relative;
            }
        </style> 
    </head>
    <body>

    <div class="title">
                <b> All Item</b>
            </div>
            
            <div class="content">
                
                <div class="left_content"> 
                    
                    <b> Category </b> <br>
                    <ul>
                        <li> <a href="category1.html" style="color: #268147"> Fruits and Vegetables </a> </li>
                        <li> <a href="category2.html" style="color: #268147"> Dairy and Egg </a> </li>
                        <li> <a href="category3.html" style="color: #268147"> Meat and Fish </a> </li>
                        <li> <a href="category4.html" style="color: #268147"> Beverage </a> </li>
                    
                    </ul>
                    
                
                </div>
                
                
                <div class="right_content"> 
                    
                    <div class="item">
                        <img src="{{ asset('images/Chicken.jpg') }}" style="width: 170px; height: 170px" class="center">
                        <b> Whole Fresh Chicken </b> <br>
                        <a href="des_chicken.html" style="font-size: 12px; color: #268147"> Description </a> <br>
                        <div style="color: #268147; text-align: center"> RM 16.50 / 1 pcs </div>
                        <form class="item_input"> 
                            <input type="number" name="chicken" size="5" value="1" class="quantity">
                            <button name="add" onclick="addedtocart()"> Add </button>
                        </form>
                    </div>
                    
                    <div class="item">
                        <img src="{{ asset('images/Meet.jpg') }}" style="width: 170px; height: 170px" class="center">
                        <b> Fresh Beef </b> <br>
                        <a href="des_beef.html" style="font-size: 12px; color: #268147"> Description </a> <br>
                        <div style="color: #268147; text-align: center"> RM 21.90 / 1 packet </div>
                        <form class="item_input"> 
                            <input type="number" name="beef" size="5" value="1" class="quantity">
                            <button name="add" onclick="addedtocart()"> Add </button>
                        </form>
                    </div>
                    
                    <div class="item">
                        <img src="{{ asset('images/Apple.jpg') }}" style="width: 170px; height: 170px" class="center">
                        <b> Red Apple </b> <br>
                        <a href="des_apple.html" style="font-size: 12px; color: #268147"> Description </a> <br>
                        <div style="color: #268147; text-align: center"> RM 0.90 / 1 pcs </div>
                        <form class="item_input"> 
                            <input type="number" name="apple" size="5" value="1" class="quantity">
                            <button name="add" onclick="addedtocart()"> Add </button>
                        </form>
                    </div>
                    
                    <div class="item">
                        <img src="{{ asset('images/Banana.jpg') }}" style="width: 170px; height: 170px" class="center">
                        <b> Organic Banana </b> <br>
                        <a href="des_banana.html" style="font-size: 12px; color: #268147"> Description </a> <br>
                        <div style="color: #268147; text-align: center"> RM 5.90 / 7 pcs </div>
                        <form class="item_input"> 
                            <input type="number" name="banana" size="5" value="1" class="quantity">
                            <button name="add" onclick="addedtocart()"> Add </button>
                        </form>
                    </div>
                    
                    <div class="item">
                        <img src="{{ asset('images/CocaCola.jpg') }}" style="width: 170px; height: 170px" class="center">
                        <b> Coca Cola (Can) </b> <br>
                        <a href="des_coke.html" style="font-size: 12px; color: #268147"> Description </a> <br>
                        <div style="color: #268147; text-align: center"> RM 1.70 / 250 ml </div>
                        <form class="item_input"> 
                            <input type="number" name="cocacola" size="5" value="1" class="quantity">
                            <button name="add" onclick="addedtocart()"> Add </button>
                        </form>
                    </div>
                    
                    <div class="item">
                        <img src="{{ asset('images/EggGredA.jpg') }}" style="width: 170px; height: 170px" class="center">
                        <b> Egg Grade A </b> <br>
                        <a href="des_eggA.html" style="font-size: 12px; color: #268147"> Description </a> <br>
                        <div style="color: #268147; text-align: center"> RM 13.50 / 30 pcs </div>
                        <form class="item_input"> 
                            <input type="number" name="egggradea" size="5" value="1" class="quantity">
                            <button name="add" onclick="addedtocart()"> Add </button>
                        </form>
                    </div>
                    
                    <div class="item">
                        <img src="{{ asset('images/EggGredB.jpg') }}" style="width: 170px; height: 170px" class="center">
                        <b> Egg Grade B </b> <br>
                        <a href="des_eggB.html" style="font-size: 12px; color: #268147"> Description </a> <br>
                        <div style="color: #268147; text-align: center"> RM 11.50 / 30 pcs </div>
                        <form class="item_input"> 
                            <input type="number" name="egggradeb" size="5" value="1" class="quantity">
                            <button name="add" onclick="addedtocart()"> Add </button>
                        </form>
                    </div>
                    
                    <div class="item">
                        <img src="{{ asset('images/Salad.jpg') }}" style="width: 170px; height: 170px" class="center">
                        <b> Fresh Salad </b> <br>
                        <a href="des_salad.html" style="font-size: 12px; color: #268147"> Description </a> <br>
                        <div style="color: #268147; text-align: center"> RM 6.50 / 1 packet </div>
                        <form class="item_input"> 
                            <input type="number" name="salad" size="5" value="1" class="quantity">
                            <button name="add" onclick="addedtocart()"> Add </button>
                        </form>
                    </div>
                    
                    <div class="item">
                        <img src="{{ asset('images/Sawi.jpg') }}" style="width: 170px; height: 170px" class="center">
                        <b> Fresh Mustard Leaf / Sawi </b> <br>
                        <a href="des_sawi.html" style="font-size: 12px; color: #268147"> Description </a> <br>
                        <div style="color: #268147; text-align: center"> RM 2.00 / 1 packet </div>
                        <form class="item_input"> 
                            <input type="number" name="sawi" size="5" value="1" class="quantity">
                            <button name="add" onclick="addedtocart()"> Add </button>
                        </form>
                    </div>
                    
                    <div class="item">
                        <img src="{{ asset('images/AsianSeaBass.jpg') }}" style="width: 170px; height: 170px" class="center">
                        <b> Asian Sea Bass / Ikan Siakap </b> <br>
                        <a href="des_siakap.html" style="font-size: 12px; color: #268147"> Description </a> <br>
                        <div style="color: #268147; text-align: center"> RM 14.90 / 1 pcs </div>
                        <form class="item_input"> 
                            <input type="number" name="siakap" size="5" value="1" class="quantity">
                            <button name="add" onclick="addedtocart()"> Add </button>
                        </form>
                    </div>
                    
                    <div class="item">
                        <img src="{{ asset('images/RedSnapper.jpg') }}" style="width: 170px; height: 170px" class="center">
                        <b> Red Snapper / Ikan Merah </b> <br>
                        <a href="des_redsnapper.html" style="font-size: 12px; color: #268147"> Description </a> <br>
                        <div style="color: #268147; text-align: center"> RM 28.00 / 1 pcs </div>
                        <form class="item_input"> 
                            <input type="number" name="redsnapper" size="5" value="1" class="quantity">
                            <button name="add" onclick="addedtocart()"> Add </button>
                        </form>
                    </div>
                    
                    <div class="item">
                        <img src="{{ asset('images/Watermelon.jpg') }}" style="width: 170px; height: 170px" class="center">
                        <b> Red Watermelon </b> <br>
                        <a href="des_watermelon.html" style="font-size: 12px; color: #268147"> Description </a> <br>
                        <div style="color: #268147; text-align: center"> RM 6.20 / 1 pcs </div>
                        <form class="item_input"> 
                            <input type="number" name="watermelon" size="5" value="1" class="quantity">
                            <button name="add" onclick="addedtocart()"> Add </button>
                        </form>
                    </div>
                    
                    <div class="item">
                        <img src="{{ asset('images/Potato.jpg') }}" style="width: 170px; height: 170px" class="center">
                        <b> Potato </b> <br>
                        <a href="des_potato.html" style="font-size: 12px; color: #268147"> Description </a> <br>
                        <div style="color: #268147; text-align: center"> RM 2.90 / 1 packet </div>
                        <form class="item_input"> 
                            <input type="number" name="potato" size="5" value="1" class="quantity">
                            <button name="add" onclick="addedtocart()"> Add </button>
                        </form>
                    </div>
                    
                    <div class="item">
                        <img src="{{ asset('images/MineralWater.jpg') }}" style="width: 170px; height: 170px" class="center">
                        <b> Cactus Natural Mineral Water </b> <br>
                        <a href="des_mineralW.html" style="font-size: 12px; color: #268147"> Description </a> <br>
                        <div style="color: #268147; text-align: center"> RM 6.20 / 5.5 L </div>
                        <form class="item_input"> 
                            <input type="number" name="mineral" size="5" value="1" class="quantity">
                            <button name="add" onclick="addedtocart()"> Add </button>
                        </form>
                    </div>
                    
                    <div class="item">
                        <img src="{{ asset('images/TropicanaTwister.jpg') }}" style="width: 170px; height: 170px" class="center">
                        <b> Tropicana Twister Orange Juice </b> <br>
                        <a href="des_twisterO.html" style="font-size: 12px; color: #268147"> Description </a> <br>
                        <div style="color: #268147; text-align: center"> RM 5.90 / 1.5 L </div>
                        <form class="item_input"> 
                            <input type="number" name="twister" size="5" value="1" class="quantity">
                            <button name="add" onclick="addedtocart()"> Add </button>
                        </form>
                    </div>
                    
                    <div class="item">
                        <img src="{{ asset('images/SaltedEgg.jpg') }}" style="width: 170px; height: 170px" class="center">
                        <b> Salted Egg </b> <br>
                        <a href="des_saltedEgg.html" style="font-size: 12px; color: #268147"> Description </a> <br>
                        <div style="color: #268147; text-align: center"> RM 9.00 / 10 pcs </div>
                        <form class="item_input"> 
                            <input type="number" name="saltedegg" size="5" value="1" class="quantity">
                            <button name="add" onclick="addedtocart()"> Add </button>
                        </form>
                    </div>
                </div>      
            </div>
        </body>      
    </html>