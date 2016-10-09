<article>
    <header>
        <h1></h1>
    </header>
    <h1></h1>
    <table>
        <thead>
            <tr>
                <th>번호</th>
                <th>제목</th>
                <th>작성자</th>
                <th>작성일</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach($list as $lt){ ?>
            <tr>
                <th><?php echo $lt -> boardNum;?></th>
                <td><a rel="external" href="/<?php echo $this -> uri -> segment(1);?>/view/<?php echo $this -> uri -> segment(2);?>/<?php echo $lt -> boardNum;?>"><?php echo $lt -> boardTitle;?></a></td>
                <td><?php echo $lt -> id;?></td>
                <td>
                <time datetime="<?php echo mdate("%Y-%M-%j", human_to_unix($lt -> boardDate)); ?>">
                    <?php echo mdate("%Y-%M-%j", human_to_unix($lt -> boardDate));?>
                </time></td>
            </tr>
          <?php } ?>
        </tbody>
    </table>
</article>
