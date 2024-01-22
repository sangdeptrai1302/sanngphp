
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<?php
use App\Models\Slider;

// Lấy danh sách slider từ cơ sở dữ liệu
$list_slider = Slider::where([
    ['status', '=', 1],
    ['position', '=', 'slideshow']
])->orderBy('sort_order','ASC')->get();
?>

<?php if(count($list_slider) > 0): ?>
    <section class="slideShow">
        <div id="carousel-slide" class="carousel slide carousel-fade" data-interval="15000" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php foreach ($list_slider as $index => $slider): ?>
                    <button type="button" data-bs-target="#carousel-slide" data-bs-slide-to="<?= $index; ?>" class="<?= ($index === 0) ? 'active' : ''; ?>"></button>
                <?php endforeach; ?>
            </div>
            <div class="carousel-inner">
                <?php foreach ($list_slider as $index => $slider): ?>
                    <div class="carousel-item <?= ($index === 0) ? 'active' : ''; ?>">
                        <a href="<?= $slider->link; ?>" style="width: 100%" target="_blank">
                            <img src="public/dist/images/slider/<?= $slider->image; ?>" class="d-block w-100" alt="<?= $slider->alt_text; ?>" width="1468" height="696">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <button type="button" class="carousel-control-prev" data-bs-target="#carousel-slide" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button type="button" class="carousel-control-next" data-bs-target="#carousel-slide" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
<?php endif; ?>