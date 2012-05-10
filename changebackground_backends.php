<?php

class ImagickConsole {
	public static function convert($geo, $infile, $outfile, $mode = "scale") {
		$command = sprintf("convert \"%s\" -resize %s^ -gravity center -extent %s \"%s\"", $infile, $geo, $geo, $outfile);
		system($command);
	}

	public static function montage($geo, $tiles, $infiles, $outfile) {
		$command = sprintf("montage \"%s\" -tile \"%s\" -geometry \"%s\" -background black \"%s\"", implode("\" \"", $infiles), $tiles, $geo, $outfile);
		system($command);
	}
}

class ImagickLibrary {
	public static function convert($geo, $infile, $outfile, $mode = "scale") {
		var_dump($infile);
		$in = new Imagick($infile);
		$in->setGravity(imagick::GRAVITY_CENTER);

		$s = explode("x", $geo);
		if ($mode == "scale") {
			$in->scaleImage($s[0], $s[1], true);
		} else {
			$sizes = $in->getImageGeometry();
			if ($d['width'] < $d['height']) {
				$in->scaleImage($s[0], 0);
			} else {
				$in->scaleImage(0, $s[0]);
			}
			$in->setImageExtent($s[0], $s[1]);
		}
		$in->writeImage($outfile);
		$in->destroy();
		$in = null;
	}

	public static function montage($geo, $tiles, $infiles, $outfile) {
		$command = sprintf("montage \"%s\" -tile \"%s\" -geometry \"%s\" -background black \"%s\"", implode("\" \"", $infiles), $tiles, $geo, $outfile);
		system($command);
	}
}

class GmagickConsole {
	public static function convert($geo, $infile, $outfile, $mode = "scale") {
		$command = sprintf("gm convert \"%s\" -resize %s^ -gravity center -extent %s \"%s\"", $infile, $geo, $geo, $outfile);
		system($command);
	}

	public static function montage($geo, $tiles, $infiles, $outfile) {
		$s = explode("x", $geo);
		$s[0] = $s[0] * 2;
		$geo = implode("x", $s);
		$command = sprintf("gm montage \"%s\" -tile \"%s\" -geometry \"%s!\" -background black \"%s\"", implode("\" \"", $infiles), $tiles, $geo, $outfile);
		system($command);
	}
}

class GmagickLibrary {
	public static function convert($geo, $infile, $outfile, $mode = "scale") {
		var_dump($infile);
		$in = new Gmagick($infile);
		#$in->setGravity(imagick::GRAVITY_CENTER);

		$s = explode("x", $geo);
		if ($mode == "scale") {
			$in->scaleImage($s[0], $s[1], true);
		} else {
			$sizes = $in->getImageGeometry();
			if ($d['width'] < $d['height']) {
				$in->scaleImage($s[0], 0);
			} else {
				$in->scaleImage(0, $s[0]);
			}
			$in->setImageExtent($s[0], $s[1]);
		}
		$in->writeImage($outfile);
		$in->destroy();
		$in = null;
	}

	public static function montage($geo, $tiles, $infiles, $outfile) {
		$command = sprintf("montage \"%s\" -tile \"%s\" -geometry \"%s\" -background black \"%s\"", implode("\" \"", $infiles), $tiles, $geo, $outfile);
		system($command);
	}
}
?>
