<p align="center"><img width="800" src="http://ozd26c105.bkt.clouddn.com/cover.png?imageView2/0/q/75|imageslim"></p>

<p align="center">A PHP language based script that automates the submission of Github Commit.</p>
<p align="center">This script is only available on **Osx** and **Linux** systems.</p>


## Use

Please  clone to your local

```shell
$ git clone https://github.com/Alicezation/Commits.git commits

$ cd commits
```

Then get root permission
```shell
$ sudo -s
```

Execute the script
```shell
$ php commit.php
```

Then wait for the script to finish

## Config

All configuration items are in the $ init array, which you can configure based on your needs

* start_time

Time to start committing

* end_time

The time to end the commit

* repository_url

commit project address, if you fill in this configuration item, will automatically initialize git for you

* max_count

The maximum number of commits per day

* min_count

The minimum number of commits per day

## End
