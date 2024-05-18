<?php   
    $combined = [];

    if (!empty($colleges)) {
        foreach ($colleges as $college) {
            $combined[] = [
                'name' => "<a href='".base_url('college-detail/'.$college['slug']."/".$college['id'])."'>".$college['full_name']."</a>",
                'category' => 'College'
            ];
        }
    }

    if (!empty($news)) {
        foreach ($news as $new) {
            $combined[] = [
                'name' => $new['title'],
                'category' => 'News'
            ];
        }
    }

    if (!empty($courses)) {
        foreach ($courses as $course) {
            $combined[] = [
                'name' => $course['course'],
                'category' => 'Course'
            ];
        }
    }

    if (!empty($branches)) {
        foreach ($branches as $branch) {
            $combined[] = [
                'name' => $branch['branch'],
                'category' => 'Branch'
            ];
        }
    }
    shuffle($combined);
?>

<?php if(!empty($combined )){ 
    foreach($combined  as $combine){ ?>
        <div class="item">
            <div class="suggestion"><?=$combine['name']; ?></div>
            <div class="category"><?=$combine['category']; ?></div>
        </div>
<?php } } ?>