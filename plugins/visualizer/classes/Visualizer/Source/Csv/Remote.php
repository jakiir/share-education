<?php

// +----------------------------------------------------------------------+
// | Copyright 2013  Madpixels  (email : visualizer@madpixels.net)        |
// +----------------------------------------------------------------------+
// | This program is free software; you can redistribute it and/or modify |
// | it under the terms of the GNU General Public License, version 2, as  |
// | published by the Free Software Foundation.                           |
// |                                                                      |
// | This program is distributed in the hope that it will be useful,      |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of       |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the        |
// | GNU General Public License for more details.                         |
// |                                                                      |
// | You should have received a copy of the GNU General Public License    |
// | along with this program; if not, write to the Free Software          |
// | Foundation, Inc., 51 Franklin St, Fifth Floor, Boston,               |
// | MA 02110-1301 USA                                                    |
// +----------------------------------------------------------------------+
// | Author: Eugene Manuilov <eugene@manuilov.org>                        |
// +----------------------------------------------------------------------+

/**
 * Source manager for remote CSV files.
 *
 * @category Visualizer
 * @package Source
 *
 * @since 1.1.0
 */
class Visualizer_Source_Csv_Remote extends Visualizer_Source_Csv {

	/**
	 * Returns data parsed from source.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 * @return string The serialized array of data.
	 */
	public function getData() {
		return serialize( array(
			'source' => $this->_filename,
			'data'   => $this->_data,
		) );
	}

	/**
	 * Re populates data and series.
	 *
	 * @since 1.1.0
	 *
	 * @access private
	 * @param int $chart_id The chart id.
	 * @return boolean TRUE on success, otherwise FALSE.
	 */
	private function _repopulate( $chart_id ) {
		// if it has been already populated, then just return true
		if ( !empty( $this->_data ) && !empty( $this->_series ) ) {
			return true;
		}

		// if filename is empty, extract it from chart content
		if ( empty( $this->_filename ) ) {
			$chart = get_post( $chart_id );
			$data = unserialize( $chart->post_content );
			if ( !isset( $data['source'] ) ) {
				return false;
			}

			$this->_filename = $data['source'];
		}

		// populate series and data information
		return $this->fetch();
	}

	/**
	 * Re populates data.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 * @param array $data The actual array of data.
	 * @param int $chart_id The chart id.
	 * @return array The re populated array of data or old one.
	 */
	public function repopulateData( $data, $chart_id ) {
		return $this->_repopulate( $chart_id ) ? $this->_data : $data;
	}

	/**
	 * Re populates series.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 * @param array $series The actual array of series.
	 * @param int $chart_id The chart id.
	 * @return array The re populated array of series or old one.
	 */
	public function repopulateSeries( $series, $chart_id ) {
		return $this->_repopulate( $chart_id ) ? $this->_series : $series;
	}

	/**
	 * Returns source name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @return string The name of source.
	 */
	public function getSourceName() {
		return __CLASS__;
	}

}