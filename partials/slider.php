
<style>
        .sections {
            font-family: playfair display;
        }
        .slick-slide {
            height: 100vh;
            background-size: cover;
            background-position: center;
        }

        .slick-slide img {
            width: 100%;
            object-fit: cover;
        }

        .overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            z-index: 10;
        }

        .overlay h1 {
            font-size: 4rem;
            margin-bottom: 20px;
        }

        .overlay a {
            background-color: #ff5733;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 1.5rem;
            border-radius: 5px;
        }

        .overlay a:hover {
            background-color: #ff4500;
        }
    </style>
      <section class="slider container" id="">
            <?php
                $slide_categories = new product_category();
                $res = $slide_categories->active_featured($conn);
                if ($res && mysqli_num_rows($res)>0) {
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $category_name = $rows['category_name'];
                        ?>
                        
                                <div>
                                    <img src="assets/img/gallery/instra1.png" alt="">
                                    <div class="overlay sections">
                                        <h1>Discover>>><?= $category_name; ?></h1>
                                        <a href="shop.html">Shop Now</a>
                                    </div>
                                </div>
                        <?php
                    }
                }
            
            ?>   
    </section>
    
<script>
  $(document).ready(function(){
            $('.slider').slick({
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: false,
                dots: false,
                fade: true,
                speed: 1000
            });
        });
</script>
